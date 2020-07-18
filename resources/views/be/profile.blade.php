@extends('layouts.be')

@push('styles')

@endpush
@section('content')
    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container-fluid" id="main-container">

	        <div class="row mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 p-0">
                        	<div class="card mb-4">
                        		@if($user->utype === 'rider')
                        		<div class="card-header p-0 overflow-hidden">
                                    <div class="row no-gutters align-items-center position-relative gradient-pink">
                                        <figure class="background opacity" style="background-image: url(/assets/be/img/events1.jpg);">
                                            <img src="/assets/be/img/events1.jpg" alt="" class="" style="display: none;">
                                        </figure>

                                        <div class="container px-4 py-0">
                                            <div class="row align-items-center ">
                                                <div class="col-12 col-sm-auto text-center">
                                                    <a href="">
                                                        <figure class="avatar avatar-90 rounded-circle mx-auto my-3">
                                                            <img src="/storage/images/users/{{  $user->profile->rider_profile_avatar }}" alt="">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="col-12 col-sm text-center text-sm-left text-white">
                                                    <h3 class="mb-0">{{$user->name}}</h3>
                                                    <p class="">
                                                    	{{ucfirst($user->utype)}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                                @endif
                                <div class="card-header border-bottom">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="my-0 template-primary">Update Profile</h6>
                                            @if($user->updated_at !== $user->created_at)
                                            <p class="text-mute-high">Last update was <span>{{ date_format(date_create($user->updated_at), 'M d, Y h:i A')}}</span></p>
                                            @else
                                            <p class="text-mute-high">Member since <span>{{ date_format(date_create($user->created_at), 'M d, Y h:i A')}}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
								<div class="card-body">
								    <div class="row">
								        <div class="col-md-10 ">
				                            <form action="/profile-save-update" method="POST" enctype="multipart/form-data">
				                            	<input type="hidden" name="id" value="{{$user->id}}">
				                            	<input type="hidden" name="utype" value="{{$user->utype}}">
				                            	<input type="hidden" name="userstatus" value="{{$user->status}}">
				                            	@if($user->ref_id !== 0)
				                            	<input type="hidden" name="ref_id" value="{{$user->id}}">
				                            	@endif
				                                @csrf
									            <div class="form-group">
									            	<h2 class="mt-2">Login Info</h2>
									            </div>
								            	<hr>
									            <div class="form-group row">
									                <div class="col-lg-12 col-md-12">
									                    <label>Name</label>
									                    <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{  $user->name }}">
									                </div>
									            </div>
									            <div class="form-group row">
									                <div class="col-lg-6 col-md-6">
									                    <label>Email</label>
									                    <input type="text" class="form-control" placeholder="Email" name="email" value="{{  $user->email }}">
									                </div>
									                <div class="col-lg-6 col-md-6">
									                    <label>Gender</label>
									                    <select class="form-control" name="gender">
									                    	<option>Select Gender</option>
									                    	<option value="male" {{($user->gender === 'male' ? 'selected' : '')}}>Male</option>
									                    	<option value="female" {{($user->gender === 'female' ? 'selected' : '')}}>Female</option>
									                    	<option value="others" {{($user->gender === 'others' ? 'selected' : '')}}>Other</option>
									                    </select>
									                </div>
									            </div>
									            @if($user->utype === 'admin' && $user->ref_id !== 0)
									            <div class="form-group row">
									                <div class="col-lg-6 col-md-6">
									                    <label>Account status</label>
									                    <select class="form-control" name="status">
									                    	<option>Select Status</option>
									                    	<option value="active" {{($user->status === 'active' ? 'selected' : '')}}>Active</option>
									                    	<option value="not_active" {{($user->status === 'not_active' ? 'selected' : '')}}>Not Active</option>
									                    </select>
									                </div>
									            </div>
									            @endif
									            <div class="form-group">
									            	<h2 class="mt-4">Password Reset</h2>
									            </div>
								            	<hr>
									            <div class="form-group row">
									                <div class="col-lg-6 col-md-6">
									                    <label>New Password</label>
									                    <input type="password" class="form-control" placeholder="New Password" name="new_password">
									                </div>
									                <div class="col-lg-6 col-md-6">
									                    <label>Confirm Password</label>
									                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
									                </div>
									            </div>
									            @if($user->utype === 'rider')
									            	<input type="hidden" name="rider_profile_id" value="{{$user->profile->rider_profile_id}}">
									            	<input type="hidden" name="rider_contact_id" value="{{$user->contact->rider_contact_id}}">
										            <div class="form-group">
										            	<h2 class="mt-4">Rider Info</h2>
										            </div>
									            	<hr>
										            <div class="form-group row">
								                        <div class="col-lg-6">
								                            <label>Address</label>
								                            <textarea class="form-control" rows="4" name="rider_profile_address">{{  $user->profile->rider_profile_address }}</textarea>
								                        </div>
								                        <div class="col-lg-6">
								                            <label>Postal Code</label>
								                            <input type="text" class="form-control" placeholder="Postal Code" name="rider_profile_zip_code" value="{{  $user->profile->rider_profile_zip_code }}">
								                        </div>
										            </div>
										            <div class="form-group row">
								                        <div class="col-lg-6">
										                    <label>Vehicle Plate #</label>
								                            <input type="text" class="form-control" placeholder="Vehicle Plate #" name="rider_profile_vehicle_number" value="{{  $user->profile->rider_profile_vehicle_number }}">
										                </div>
								                        <div class="col-lg-6">
										                    <label>Contact #</label>
								                            <input type="text" class="form-control" placeholder="Contact #" name="rider_contact_number" value="{{  $user->contact->rider_contact_number }}">
										                </div>
										            </div>										            
										            <div class="form-group row">
										                <div class="col-lg-12 col-md-12">
										                    <div class="row">
										                        <div class="col-lg-6">
										                            <label>Driver's License</label>
										                            <p>
										                            	@if($user->profile->rider_profile_drivers_license)
										                            	<img src="/storage/images/users/license/{{  $user->profile->rider_profile_drivers_license }}" class="w-100"/>
										                            	@else
										                            	<span class="text-danger">No photo / image!</span>
										                            	@endif
										                            </p>
										                            <input type="file" class="form-control" placeholder="Driver's License" name="rider_profile_drivers_license">
										                        </div>
										                        <div class="col-lg-6">
										                            <label>Avatar</label>
										                            <p>
										                            	@if($user->profile->rider_profile_avatar)
										                            	<img src="/storage/images/users/{{  $user->profile->rider_profile_avatar }}" class="w-100"/>
										                            	@else
										                            	<span class="text-danger">No photo / image!</span>
										                            	@endif
										                            </p>
										                            <input type="file" class="form-control" placeholder="Drivers License" name="rider_profile_avatar">
										                        </div>
										                    </div>
										                </div>
										            </div>		
									            @endif
									            <div class="card-footer">
				                                    <a href="/profile" class="btn btn-outline-secondary">Cancel</a>
				                                    <button type="submit" class="btn btn-info float-right">Save changes</button>
				                                </div>
								    		</form>
								        </div>
								    </div>
								</div>
                            </div>
                            
                        </div>
                        <div class="col-12 col-md-4 col-lg-3 pt-4">

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
@endsection
@push('scripts')
	<script>
        'user strict'
        $(document).ready(function() {

        });   
	</script>
@endpush