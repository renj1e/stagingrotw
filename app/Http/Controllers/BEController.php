<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use App\Vendors;
use App\VendorContact;
use App\Menus;
use App\Addons;
use App\User;
use App\RiderStatus;
use App\RiderContact;
use App\RiderProfile;

class BEController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myProfile(Request $request)
    {
        if($request->input('ref_id') !== null)
        {
            $_id = (int) $request->query('ref_id');
            $user = DB::table('users')
                ->where('users.id', '=', $_id)
                ->select('users.id', 'users.name', 'users.email', 'users.utype', 'users.gender', 'users.status', 'users.created_at', 'users.updated_at')
                ->first();

            // if no data has been found using "ref_id"
            if($user === null)
            {
                $user = DB::table('users')
                    ->where('users.id', '=', \Auth::user()->id)
                    ->select('users.id', 'users.name', 'users.email', 'users.utype', 'users.gender', 'users.status', 'users.created_at', 'users.updated_at')
                    ->first();

                // if no data has been found using "ref_id"

            }
            $user->ref_id = $_id;
        }
        else
        {
            $user = DB::table('users')
                ->where('users.id', '=', \Auth::user()->id)
                ->select('users.id', 'users.name', 'users.email', 'users.utype', 'users.gender', 'users.status', 'users.created_at', 'users.updated_at')
                ->first();
            $user->ref_id = 0;
        }

        if($user->utype === 'rider')
        {
            $user->profile = DB::table('rider_profile')
                ->where('rider_profile.rider_profile_rider_id', '=', $user->id)
                ->select(
                    'rider_profile.rider_profile_id',
                    'rider_profile.rider_profile_address',
                    'rider_profile.rider_profile_vehicle_number',
                    'rider_profile.rider_profile_vehicle_type',
                    'rider_profile.rider_profile_drivers_license',
                    'rider_profile.rider_profile_avatar',
                    'rider_profile.rider_profile_zip_code'
                )
                ->first();

            $user->contact = DB::table('rider_contact')
                ->where('rider_contact.rider_contact_rider_id', '=', $user->id)
                ->select(
                    'rider_contact.rider_contact_id',
                    'rider_contact.rider_contact_rider_id',
                    'rider_contact.rider_contact_number'
                )
                ->first();
        }
        // dd($user);
        if($user->utype === 'customer')
        {
            return redirect('/profile');
        }

        // dd(\Auth::user()->utype);

        if(\Auth::user()->utype === 'staff')
        {
            return view('be/profile',
                [
                    'user' => $user
                ]
            );
        }
        if(\Auth::user()->utype === 'rider')
        {
            return view('be/rider-profile',
                [
                    'user' => $user
                ]
            );
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profileSaveUpdate(Request $request)
    {
         // dd($request);
        if($request->rider_profile_avatar)
        {
            $rider_profile_avatar = md5(time()).'.'. md5($request->rider_profile_avatar->getClientOriginalName()).'.'.$request->rider_profile_avatar->getClientOriginalExtension(); 
            $request->rider_profile_avatar->storeAs('public/images/users', $rider_profile_avatar);
        }
        if($request->rider_profile_drivers_license)
        {
            $rider_profile_drivers_license = md5(time()).'.'. md5($request->rider_profile_drivers_license->getClientOriginalName()).'.'.$request->rider_profile_drivers_license->getClientOriginalExtension(); 
            $request->rider_profile_drivers_license->storeAs('public/images/users/license', $rider_profile_drivers_license);
        }

        User::where('id', (int) $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'status' => $request->status
            ]);

        if($request->new_password || $request->confirm_password)
        {
            User::where('users', (int) $request->menuid)
                ->update([
                    'password' => Hash::make($request->new_password)
                ]);
        }

        RiderProfile::where('rider_profile_id', (int) $request->rider_profile_id)
            ->update([
                'rider_profile_address' => $request->rider_profile_address,
                'rider_profile_zip_code' => $request->rider_profile_zip_code,
                'rider_profile_vehicle_number' => $request->rider_profile_vehicle_number
            ]);

        if($request->rider_profile_avatar)
        {
            RiderProfile::where('rider_profile_id', (int) $request->rider_profile_id)
                ->update([
                    'rider_profile_avatar' => $rider_profile_avatar
                ]);
        }

        if($request->rider_profile_drivers_license)
        {
            RiderProfile::where('rider_profile_id', (int) $request->rider_profile_id)
                ->update([
                    'rider_profile_drivers_license' => $rider_profile_drivers_license
                ]);
        }

        RiderContact::where('rider_contact_id', (int) $request->rider_contact_id)
            ->update([
                'rider_contact_number' => $request->rider_contact_number,
            ]);

        if((int) $request->ref_id)
        {
            return redirect('/profile?ref_id=' . $request->ref_id);
        }
        else
        {
            return redirect('/profile');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->status === 'not_active')
        {
            return redirect('/not-active');
        }
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $riders = DB::table('users')
            ->where('utype',  'rider')
            ->where('status',  'active')
            ->join('rider_status', 'rider_status.rider_status_rider_id', '=', 'users.id')
            ->join('rider_profile', 'rider_profile.rider_profile_rider_id', '=', 'users.id')
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'users.id')
            ->where('rider_status.rider_status_status', '!=', 'not_active')
            ->select('users.*', 'rider_status.rider_status_status', 'rider_status.rider_status_id', 'rider_profile.rider_profile_address', 'rider_profile.rider_profile_zip_code', 'rider_contact.rider_contact_type', 'rider_contact.rider_contact_number')
            ->get();

        // $customers = DB::table('users')
        //     ->where('users.utype', '=', 'customer')
        //     ->join('order_track', 'order_track.order_trackcustomerid', '=', 'users.id')
        //     ->where(function ($query) {
        //         $query->where('order_track.order_trackstatus', '=', 'processing')
        //          ->orWhere('order_track.order_trackstatus', '=', 'purchased')
        //          ->orWhere('order_track.order_trackstatus', '=', 'otw')
        //          ->orWhere('order_track.order_trackstatus', '=', 'order_confirmed_and_received');
        //     })
        //     ->select('users.id', 'users.name', 'order_track.*')
        //     ->get();

        $customers = DB::table('order_track')
            ->where(function ($query) {
                $query->where('order_track.order_trackstatus', '=', 'processing')
                    ->orWhere('order_track.order_trackstatus', '=', 'purchased')
                    ->orWhere('order_track.order_trackstatus', '=', 'otw')
                    ->orWhere('order_track.order_trackstatus', '=', 'order_confirmed_and_received');
            })
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('users.id', 'users.name', 'order_track.*', 'customer_address.*')
            ->get();

            // dd($customers);
        return view('be/index',
            [
                'riders' => $riders,
                'customers' => $customers
            ]
        );
    }

    public function orderList()
    {
        if(\Auth::user()->status === 'not_active')
        {
            return redirect('/not-active');
        }
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $orders = DB::table('order_track')
            ->where(function ($query) {
                $query->where('order_track.order_trackstatus', '=', 'delivered');
                // $query->where('order_track.order_track_riderid', '=', \Auth::user()->id);
            })
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->join('rider_profile', 'rider_profile.rider_profile_rider_id', '=', 'order_track.order_track_riderid')
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'order_track.order_track_riderid')
            ->select('users.id', 'users.name', 'order_track.*', 'customer_address.*', 'rider_profile.*', 'rider_contact.*')
            ->get();

        foreach ($orders as $k => $v)
        {
            $_rider = [];
            $_add = DB::table('users')
                ->where('id', $v->order_track_riderid)
                ->first();

            $orders[$k]->rider = $_add;

            $_o = [];
            if($v->order_trackorderid !== '{}' || $v->order_trackorderid !== '[]')
            {
                $_ik = explode(',', str_replace(array('[',']'), '', $v->order_trackorderid));

                foreach ($_ik as $id => $val) {
                    $_oid = (int) str_replace(array('"'), '', $val);

                    $_order_details = DB::table('order')
                        ->where('orderid', $_oid)
                        ->join('menus', 'menus.menuid', 'order.ordermenuid')
                        ->join('vendors', 'vendors.vendorid', 'menus.vendorid')
                        ->select('order.*', 'menus.*', 'vendors.*')
                        ->first();
                    array_push($_o, $_order_details);
                }

                $orders[$k]->orders = $_o;

            }
        }
            // dd($orders);


        return view('be/order-list',
            [
                'orders' => $orders
            ]
        );
    }

    public function myOrderList()
    {
        if(\Auth::user()->status === 'not_active')
        {
            return redirect('/not-active');
        }
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'staff')
        {
            return redirect('/admin');
        }
        $orders = DB::table('order_track')
            ->where(function ($query) {
                $query->where('order_track.order_trackstatus', '=', 'delivered');
                $query->where('order_track.order_track_riderid', '=', \Auth::user()->id);
            })
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('users.id', 'users.name', 'order_track.*', 'customer_address.*')
            ->get();


        foreach ($orders as $k => $v)
        {
            $_o = [];
            if($v->order_trackorderid !== '{}' || $v->order_trackorderid !== '[]')
            {
                $_ik = explode(',', str_replace(array('[',']'), '', $v->order_trackorderid));

                foreach ($_ik as $id => $val) {
                    $_oid = (int) str_replace(array('"'), '', $val);

                    $_order_details = DB::table('order')
                        ->where('orderid', $_oid)
                        ->join('menus', 'menus.menuid', 'order.ordermenuid')
                        ->join('vendors', 'vendors.vendorid', 'menus.vendorid')
                        ->select('order.*', 'menus.*', 'vendors.*')
                        ->first();
                    array_push($_o, $_order_details);
                }

                $orders[$k]->orders = $_o;

            }
        }

        return view('be/rider-order-list',
            [
                'orders' => $orders
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function riderList()
    {
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $riders = DB::table('users')
            ->where('utype',  'rider')
            ->join('rider_status', 'rider_status.rider_status_rider_id', '=', 'users.id')
            ->join('rider_profile', 'rider_profile.rider_profile_rider_id', '=', 'users.id')
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'users.id')
            // ->where('rider_status.rider_status_status', '!=', 'not_active')
            ->select('users.*', 'rider_status.rider_status_status', 'rider_status.rider_status_id', 'rider_profile.rider_profile_address', 'rider_profile.rider_profile_zip_code', 'rider_profile.rider_profile_vehicle_number', 'rider_profile.rider_profile_vehicle_type', 'rider_profile.rider_profile_avatar', 'rider_profile.rider_profile_drivers_license', 'rider_contact.rider_contact_type', 'rider_contact.rider_contact_number')
            ->get();
            // dd($riders);
        return view('be/rider-list',
            [
                'riders' => $riders
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function riderAdd(Request $request)
    {
        // dd($request);
        $rider_profile_avatar = md5(time()).'.'. md5($request->rider_profile_avatar->getClientOriginalName()).'.'.$request->rider_profile_avatar->getClientOriginalExtension(); 
        $request->rider_profile_avatar->storeAs('public/images/users', $rider_profile_avatar);

        $rider_profile_drivers_license = md5(time()).'.'. md5($request->rider_profile_drivers_license->getClientOriginalName()).'.'.$request->rider_profile_drivers_license->getClientOriginalExtension(); 
        $request->rider_profile_drivers_license->storeAs('public/images/users/license', $rider_profile_drivers_license);
        // dd($request);

        // 'all-time-meal' = 1
        // 'breakfast' = 2
        // 'lunch' = 3
        // 'dinner' = 4
        // 'merienda' = 5

        $u = new User;
        $u->name = $request->name;
        $u->email = $request->email;
        $u->utype = 'rider';
        $u->password = Hash::make($request->password);
        $u->save();
        
        $_lid = $u->id;

        $rs = new RiderStatus;
        $rs->rider_status_rider_id = $_lid;
        $rs->rider_status_status = 'not_active';
        $rs->save();

        foreach ($request->rider_contact_number as $k => $v)
        {
            $rs = new RiderContact;
            $rs->rider_contact_rider_id = $_lid;
            $rs->rider_contact_type = 'mobile';
            $rs->rider_contact_number = $v;
            $rs->save();
        }

        $rp = new RiderProfile;
        $rp->rider_profile_rider_id = $_lid;
        $rp->rider_profile_vehicle_type = 'others';
        $rp->rider_profile_address = $request->rider_profile_address;
        $rp->rider_profile_zip_code = $request->rider_profile_zip_code;
        $rp->rider_profile_vehicle_number = $request->rider_profile_vehicle_number; // img
        $rp->rider_profile_avatar = $rider_profile_avatar; // img
        $rp->rider_profile_drivers_license = $rider_profile_drivers_license; // img
        $rp->save();


        return redirect('/rider-list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customerList()
    {
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $customers = DB::table('users')
            ->where('users.utype', '=', 'customer')
            ->select('users.id', 'users.name', 'users.email', 'users.gender', 'users.created_at')
            ->get();

        foreach ($customers as $k => $v)
        {
            $_c = [];
            $_contacts = DB::table('contact')
                ->where('concustomerid', $v->id)
                ->get();

            $customers[$k]->contacts = $_contacts;
        }

        foreach ($customers as $k => $v)
        {
            $_address = [];
            $_add = DB::table('customer_address')
                ->where('cacustomerid', $v->id)
                ->get();

            $customers[$k]->address = $_add;
        }
            // dd($customers);
        return view('be/customer-list',
            [
                'customers' => $customers
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productList()
    {
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $menu = DB::table('menus')
            ->get();

        foreach ($menu as $k => $v)
        {
            $_vendor = DB::table('vendors')
                ->where('vendorid', $v->vendorid)
                ->first();

            $_vendor_contact = DB::table('vendor_contact')
                ->where('vc_vendor_id', $v->vendorid)
                ->get();

            $_addons = DB::table('addons')
                ->where('addmenuid', $v->menuid)
                ->get();        

            if(isset($v->maddons))
            {
                $_am = [];
                $_ma = explode(',', str_replace(array('[',']'), '', $v->maddons));

                foreach ($_ma as $a)
                {
                    $_addon_menu = DB::table('addon_menu')
                        ->where('amid', $a)
                        ->first();

                    array_push($_am, $_addon_menu);
                }
                $menu[$k]->addon_menu = collect($_am);
            }
                
            $_mt = explode(',', str_replace(array('[',']'), '', $v->mtype));

            $menu[$k]->vendor = $_vendor;
            $menu[$k]->vendor_contact = $_vendor_contact;
            $menu[$k]->addons = $_addons;
            $menu[$k]->mt = collect($_mt);
        }
        // dd($menu);
        $vendors = DB::table('vendors')
            ->where('vendors.vis_activated', 1)
            ->get();

        // dd($menu);

        return view('be/product-list',
            [
                'menu' => $menu,
                'vendors' => $vendors
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productAdd(Request $request)
    {
        if(isset($request->maddons))
        {
            $keys = array_keys($request->maddons);
            $addons = '[' . implode(',', $keys) . ']';
        }

        // dd($addons);
        $_mavatar = md5($request->vendorid).'.'. md5($request->mavatar->getClientOriginalName()).'.'.$request->mavatar->getClientOriginalExtension(); 
        $request->mavatar->storeAs('public/images', $_mavatar);
        // dd($request);

        // 'all-time-meal' = 1
        // 'breakfast' = 2
        // 'lunch' = 3
        // 'dinner' = 4
        // 'merienda' = 5

        $m = new Menus;
        $m->mname = $request->mname;
        $m->vendorid = $request->vendorid;
        $m->mtype = '[' . implode(',', $request->mtype) . ']';

        if(isset($request->maddons))
        {
            $m->maddons = $addons;
        }

        $m->mdesc = $request->mdesc;
        $m->mprice = $request->mprice;
        $m->mquantity = $request->mquantity;
        $m->mavatar = $_mavatar;
        $m->save();
        $_lid = $m->id;
        
        return redirect('/product-list');
    }

    public function getVendorAddons(Request $request)
    {
        $addons = DB::table('addon_menu')
            ->where('am_vendorid', $request->id)
            ->get();
        return response()->json($addons);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productUpdate($id)
    {
        $menu = DB::table('menus')
                ->where('menuid', $id)
                ->first();

        $_contact = DB::table('vendor_contact')
            ->where('vc_vendor_id', $menu->vendorid)
            ->get();

        $_vendor = DB::table('vendors')
            ->where('vendorid', $menu->vendorid)
            ->first();

        $_ma = explode(',', str_replace(array('[',']'), '', $menu->maddons));
        $_ma_arr = [];

        if(count($_ma) > 0)
        {
            foreach ($_ma as $k => $v)
            {
                $addons = DB::table('addon_menu')
                    ->where('amid', (int) $v)
                    ->first();
                array_push($_ma_arr, $addons);
            }

            $menu->addons = collect($_ma_arr);
        }

        $_mtype = explode(',', str_replace(array('[',']'), '', $menu->mtype));
        $_mtype_arr = [];

        if(count($_mtype) > 0)
        {
            foreach ($_mtype as $k => $v)
            {
                array_push($_mtype_arr, (int) $v);
            }

            $menu->type = $_mtype_arr;
        }

        $menu->contact = $_contact;
        $menu->vendor = $_vendor;

        $vendors = DB::table('vendors')
            ->where('vendors.vis_activated', 1)
            ->get();
           // dd($menu);
        return view('be/product-update',
            [
                'menu' => $menu,
                'vendors' => $vendors
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productSaveUpdate(Request $request)
    {
        // dd($request);
        if($request->maddons)
        {
            $keys = array_keys($request->maddons);
            $addons = '[' . implode(',', $keys) . ']';
        }
        else
        {
            $addons = null;
        }
        $type = '[' . implode(',', $request->mtype) . ']';
        if($request->mavatar)
        {
            $_mavatar = md5($request->vendorid).'.'. md5($request->mavatar->getClientOriginalName()).'.'.$request->mavatar->getClientOriginalExtension(); 
            $request->mavatar->storeAs('public/images', $_mavatar);
        }

        Menus::where('menuid', (int) $request->menuid)
            ->update([
                'mname' => $request->mname,
                'vendorid' => $request->vendorid,
                'mtype' => $type,
                'mdesc' => $request->mdesc,
                'mprice' => $request->mprice,
                'mquantity' => $request->mquantity,
                'mis_activated' => $request->mis_activated,
                'maddons' => $addons,
            ]);

        return redirect('/product-list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeList()
    {
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $stores = DB::table('vendors')
            ->get();

        foreach ($stores as $k => $v)
        {
            $_contact = DB::table('vendor_contact')
                ->where('vc_vendor_id', $v->vendorid)
                ->get();

            $stores[$k]->contact = $_contact;
        }

            // dd($stores);
        return view('be/store-list',
            [
                'stores' => $stores
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeAdd(Request $request)
    {
        $v = new Vendors;
        $v->vname = $request->vname;
        $v->vstreet = $request->vstreet;
        $v->vcity = $request->vcity;
        $v->vprovince = $request->vprovince;
        $v->vcountry = $request->vcountry;
        $v->vis_activated = $request->vis_activated;
        $v->save();
        $_lid = $v->id;

        foreach ($request->contact as $rc)
        {
            $vc = new VendorContact;
            $vc->vc_vendor_id = $_lid;
            $vc->vc_number = $rc;
            $vc->save();
        }

        return redirect('/store-list');
    }
    
    public function storeUpdate($id)
    {
        $store = DB::table('vendors')
                ->where('vendorid', $id)
                ->first();

        $_contact = DB::table('vendor_contact')
            ->where('vc_vendor_id', $store->vendorid)
            ->get();

        $store->contact = $_contact;
        // dd($store);
        return view('be/store-update',
            [
                'store' => $store
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function notActive()
    {
        return view('be/not-active');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeSaveUpdate(Request $request)
    {
        // dd($request);
        Vendors::where('vendorid', (int) $request->vendorid)
            ->update([
                'vname' => $request->vname,
                'vstreet' => $request->vstreet,
                'vcity' => $request->vcity,
                'vprovince' => $request->vprovince,
                'vcountry' => $request->vcountry,
                'vis_activated' => $request->vis_activated
            ]);

        foreach ($request->contact as $rc)
        {
            $key = array_search($rc, $request->contact);

            VendorContact::where('vcid', (int) $key)
                ->update([
                    'vc_number' => $rc,
                    'updated_at' => date('Y-m-d h:i:s')
                ]);
        }

        return redirect('/store-list');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rider()
    {
        if(\Auth::user()->status === 'not_active')
        {
            return redirect('/not-active');
        }
        if(\Auth::user()->utype === 'staff')
        {
            return redirect('/admin');
        }
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }

        $orders = DB::table('order_track')
            ->where('order_track.order_track_riderid', '=', \Auth::user()->id)
            ->where(function ($query) {
                $query->where('order_track.order_trackstatus', '=', 'processing')
                    ->orWhere('order_track.order_trackstatus', '=', 'processing')
                    ->orWhere('order_track.order_trackstatus', '=', 'purchased')
                    ->orWhere('order_track.order_trackstatus', '=', 'otw');
                    // ->orWhere('order_track.order_trackstatus', '=', 'delivered');
            })
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('order_track.*', 'users.id', 'users.name', 'customer_address.*')
            ->get();

        $status = DB::table('rider_status')
            ->where('rider_status_rider_id', \Auth::user()->id)
            ->first();

            // dd($status);
        return view('be/index-rider',
            [
                'orders' => $orders,
                'status' => $status,
            ]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAllRiders()
    {
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/rider');
        }

        $riders = DB::table('users')
            ->where('utype',  'rider')
            ->where('status',  'active')
            ->join('rider_status', 'rider_status.rider_status_rider_id', '=', 'users.id')
            ->join('rider_profile', 'rider_profile.rider_profile_rider_id', '=', 'users.id')
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'users.id')
            ->where('rider_status.rider_status_status', '!=', 'not_active')
            ->select('users.*', 'rider_status.rider_status_status', 'rider_status.rider_status_id', 'rider_profile.rider_profile_address', 'rider_contact.rider_contact_type', 'rider_contact.rider_contact_number')
            ->get();
            
        return response()->json([
            'riders'=>$riders
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAllRidersByZipCode($orderid, $zipcode)
    {

        $riders = DB::table('users')
            ->where('utype',  'rider')
            // ->where('status',  'active')
            ->join('rider_status', 'rider_status.rider_status_rider_id', '=', 'users.id')
            ->join('rider_profile', function($join) use ($zipcode) {
                $join->on('rider_profile.rider_profile_rider_id', '=', 'users.id')
                     ->where('rider_profile.rider_profile_zip_code', '=', $zipcode);
            })
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'users.id')
            ->where('rider_status.rider_status_status', '=', 'waiting')
            ->select('users.*', 'rider_status.rider_status_status', 'rider_status.rider_status_id', 'rider_profile.rider_profile_address', 'rider_profile.rider_profile_zip_code', 'rider_contact.rider_contact_type', 'rider_contact.rider_contact_number')
            ->get();
            
        return response()->json(
            $riders
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function riderChangeStatus(Request $request)
    {
        $status = DB::table('rider_status')
            ->where('rider_status_rider_id', \Auth::user()->id)
            ->update([
                'rider_status_status' => $request->get('status')
            ]);
            
        return response()->json([
            'status'=> $status
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orderChangeStatus(Request $request)
    {
        $status = DB::table('order_track')
            ->where('order_trackid', '=', (int) $request->get('otid'))
            ->update([
                'order_trackstatus' => $request->get('status'),
                'updated_at' => date('M d, Y H:i A'),
            ]);
            
        return response()->json([
            'status'=> $request->all()
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function assignOrderToRider(Request $request)
    {
        $status = DB::table('order_track')
            ->where('order_trackid', $request->get('otid'))
            ->update([
                'order_trackstatus' => 'processing',
                'order_track_riderid' => $request->get('rider')
            ]);
            
        return response()->json([
            'status'=> $status
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewOrder($id)
    {
        $order = DB::table('order_track')
            ->where('order_track.order_trackid', '=', $id)
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('order_track.*', 'users.id', 'users.name', 'customer_address.*')
            ->first();

        // foreach ($order as $k => $v) {
            $_o = [];
            if($order->order_trackorderid !== '{}' || $order->order_trackorderid !== '[]')
            {
                $_ik = explode(',', str_replace(array('[',']'), '', $order->order_trackorderid));

                foreach ($_ik as $id => $val) {
                    $_oid = (int) str_replace(array('"'), '', $val);

                    $_order_details = DB::table('order')
                        ->where('orderid', $_oid)
                        ->join('menus', 'menus.menuid', 'order.ordermenuid')
                        ->join('vendors', 'vendors.vendorid', 'menus.vendorid')
                        ->select('order.*', 'menus.*', 'vendors.*')
                        ->first();
                    array_push($_o, $_order_details);
                }

                $_all_orders = $order->orders = $_o;

                foreach ($_all_orders as $k => $v) {
                    $addons = [];
                    if($v->orderaddons !== '{}' || $v->orderaddons !== '[]')
                    {
                        $_ik = explode(',', str_replace(array('{','}'), '', $v->orderaddons));

                        foreach ($_ik as $id => $val) {
                            if(isset($val) && $val !== '')
                            {
                                $_nik = explode(':', $val);
                                $_nik_id = (int) str_replace(array('"'), '', $_nik[0]);
                                $_nik_q = (int) str_replace(array('"'), '', $_nik[1]);
                                $_addons_details = DB::table('addons')
                                    ->where('addid', $_nik_id)
                                    ->first();
                                $_addons_details->q = $_nik_q;

                                array_push($addons, $_addons_details);
                            }
                        }
                        $_all_orders[$k]->addons = $addons;
                    }
                }


            }
        // }
            // dd($order);
        return view('be/view-order',
            [
                'id' => $order->order_trackid,
                'order' => $order,
            ]
        );
    }
}
