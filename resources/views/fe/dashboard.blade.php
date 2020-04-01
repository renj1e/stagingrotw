@extends('layouts.fe')

@section('content')
    <section>
        <div class="block">
            <div class="fixed-bg" style="background-image: url(/assets/fe/images/topbg.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Dashboard</h1>
                            <span>Welcome to OTW Customer's Dashboard</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-tabs-wrapper">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 col-lg-4">
                                        <div class="profile-sidebar brd-rd5 wow fadeIn" data-wow-delay="0.2s">
                                            <div class="profile-sidebar-inner brd-rd5">
                                                <div class="user-info red-bg">
                                                    <img class="brd-rd50" src="/assets/fe/images/resource/profile-thumb2.jpg" alt="user-avatar.jpg" itemprop="image">
                                                    <div class="user-info-inner">
                                                        <h5 itemprop="headline"><a href="#" title="" itemprop="url">{{ \Auth::user()->name }}</a></h5>
                                                        <span><a href="#" title="" itemprop="url">{{ \Auth::user()->email }}</a></span>
										                <a href="{{ route('logout') }}" title="Logout" itemprop="url" class="brd-rd3 sign-out-btn yellow-bg"
										                   onclick="event.preventDefault();
										                                 document.getElementById('logout-form').submit();">
										                    <i class="fa fa-sign-out"></i> LOGOUT
										                </a>
										                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										                    @csrf
										                </form>
                                                    </div>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li  class="active"><a href="#my-orders" data-toggle="tab"><i class="fa fa-shopping-basket"></i> MY ORDERS</a></li>
                                                    <li><a href="#delivery-address" data-toggle="tab"><i class="fa fa-map"></i> DELIVERY ADDRESS</a></li>
                                                    <!-- <li><a href="#statement" data-toggle="tab"><i class="fa fa-wpforms"></i> STATEMENT</a></li> -->
                                                    <li><a href="#account-settings" data-toggle="tab"><i class="fa fa-cog"></i> ACCOUNT SETTINGS</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-lg-8">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="my-orders">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline">MY DELIVERED ORDERS</h4>
                                                    <div class="order-list">

                                                        @foreach($prev_orders as $o)
                                                            @foreach($o->orders as $po)
                                                                <div class="order-item brd-rd5">
                                                                    <div class="order-thumb brd-rd5">
                                                                        <a href="/menu-detail/{{ $po->menuid }}" title="" itemprop="url"><img src="/storage/images/{{ $po->mavatar }}" alt="order-img1.jpg" itemprop="image"></a>
                                                                    </div>
                                                                    <div class="order-info">
                                                                        <span class="red-clr">
                                                                            {{ $po->vname }}
                                                                        </span>
                                                                        <h4 itemprop="headline" style="margin-top:0"><a href="/menu-detail/{{ $po->menuid }}" title="" itemprop="url">{{ $po->mname }}</a></h4>
                                                                        <span class="red-clr">
                                                                            @foreach($po->addons as $k => $ad)
                                                                                {{ $ad->addname }} (P{{ $ad->addprice }}.00) x {{ $ad->q }} {{ (($k + 1) < count($po->addons))? ',' : '' }}
                                                                            @endforeach
                                                                        </span>
                                                                        
                                                                        <span class="price">P{{ $po->mprice }}.00</span>
                                                                        <a class="brd-rd2" href="/menu-detail/{{ $po->menuid }}" title="" itemprop="url">Detail</a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endforeach

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="delivery-address">
                                                <div class="tabs-wrp brd-rd5">
                                                    <h4 itemprop="headline">DELIVERY ADDRESS <button class="btn btn-success btn-address-form btn-xs"><i class="fa fa-plus"></i> New Address</button></h4>

                                                    <div class="new-address-form">
														<form id="add-new-address-form">
															@csrf
															<input type="hidden" class="form-control" name="cacustomerid" value="{{ \Auth::user()->id }}">
														    <div class="form-group row">
														    	<div class="col-sm-6">
															        <label for="label">Label</label>
															        <input type="text" class="form-control" name="calabel" placeholder="Address Label">
														    	</div>
														    </div>
														    <div class="form-group row">
														    	<div class="col-sm-6">
															        <label for="label">Street</label>
															        <input type="text" class="form-control" name="castreet" placeholder="Address Street">
														    	</div>
														    	<div class="col-sm-6">
															        <label for="label">City</label>
															        <input type="text" class="form-control" name="cacity" placeholder="Address City">
														    	</div>
														    </div>
														    <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label for="label">Postal Code</label>
                                                                    <input type="text" class="form-control" name="cazipcode" placeholder="Postal Code">
                                                                </div>
														    	<div class="col-sm-6">
															        <label for="label">Province</label>
															        <input type="text" class="form-control" name="caprovince" placeholder="Address Province">
														    	</div>
														    </div>
														    <button type="submit" class="btn btn-success btn-add-new-address">Add</button>
														</form>
                                                    </div>

                                                    <div class="delivery-address">
	                                                    <div class="row" id="addressLists">
	                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-settings">
                                                <div class="tabs-wrp account-settings brd-rd5">
                                                    <h4 itemprop="headline">ACCOUNT SETTINGS</h4>
                                                    <div class="account-settings-inner">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-8 col-lg-8">
                                                                <div class="profile-info-form-wrap">
                                                                    <div class="form-holder">
                                                                        <form action="/customer-profile-save-update" class="profile-info-form" method="POST" enctype="multipart/form-data" id="profile-info-form">
                                                                            @csrf
                                                                            <div class="row mrg20">
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Name <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="text" name="name" value="{{\Auth::user()->name}}" placeholder="Enter Your Name">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Email Address <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="email" name="email" value="{{\Auth::user()->email}}" placeholder="Enter Your Email Address">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <button type="submit" class="btn btn-sm btn-primary btn-update-info">Save Changes</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-holder">
                                                                        <form action="/customer-password-save-update" class="profile-info-form" method="POST" enctype="multipart/form-data" id="profile-info-password-form">
                                                                            @csrf
                                                                            <div class="row mrg20">
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>New Password <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="password" name="password" placeholder="Password">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <label>Repeat Password <sup>*</sup></label>
                                                                                    <input class="brd-rd3" type="password" name="cpassword" placeholder="Repeat Password">
                                                                                </div>
                                                                                <div class="col-md-12 col-sm-12 col-lg-12">
                                                                                    <button class="btn btn-sm btn-primary btn-update-password">Save Changes</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    $('.btn-update-password').click(function(){
        console.log('TO-DO: change password');
    });
	function getMyAddress()
	{
		$.ajax({
			type: 'GET',
			url: '/getmyaddress',
			dataType: 'json',
			success:function(data){
				$('#addressLists').empty();
				$.each(data, function( i, v ) {
					$('#addressLists').append('<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">'+
						'<div class="address-holder">'+
							'<h4>'+v.calabel+' <span class="btn-remove-address" data-item-id="'+v.caid+'" title=""><i class="fa fa-trash-o"></i></span></h4>'+
							'<p>'+v.castreet+' '+v.cacity+', '+v.caprovince+' '+v.cacountry+'</p>'+
						'</div>'+
					'</div>');
				});
				removeAddress();
			},
			error:function(data){
				console.log(data);
			}
		});
	}

	function removeAddress()
	{
		$('.btn-remove-address').on('click',function(e){
	    	e.preventDefault();
	    	var id = $(this).data('item-id'); 	    	
		    $.ajax({
				type: 'POST',
				url: '/removeaddress/'+id,
				dataType: 'json',
				success:function(data){
					getMyAddress();					
					$('.cart-added-notifs').addClass('show').empty().append('<p>'+data.message+'</p>').delay(1000).show(0);
					$('.cart-added-notifs').delay(3000).fadeOut(3000).removeClass('show');
				},
				error:function(data){
				  console.log(data);
				}
		    });
		});
	}

	getMyAddress();

	// Delivery Address toggle
	$('.btn-address-form').click(function(){
		if($('.new-address-form').hasClass('show'))
		{
			$('.new-address-form').removeClass('show')
		}
		else
		{
			$('.new-address-form').addClass('show')
		}
	});



	$('.btn-add-new-address').click(function(e){
		e.preventDefault(); 
		var data = $('#add-new-address-form').serializeArray();
		$.ajax({
			type: 'POST',
			url: '/addnewaddress',
			data: data,
			dataType: 'json',
			success:function(data){
				$('#addressLists').append('<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">'+
					'<div class="address-holder">'+
						'<h4>'+data.calabel+'</h4>'+
						'<p>'+data.castreet+' '+data.cacity+', '+data.caprovince+' '+data.cacountry+'</p>'+
					'</div>'+
				'</div>');
				getMyAddress();
				$('.cart-added-notifs').addClass('show').empty().append('<p>'+data.message+'</p>').delay(1000).show(0);
				$('.cart-added-notifs').delay(3000).fadeOut(3000).removeClass('show');
			},
			error:function(data){
				console.log(data);
			}
		});
	});
</script>
@endpush