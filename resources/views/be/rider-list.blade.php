@extends('layouts.be')

@push('styles')
    <!-- dataTable CSS -->
    <link href="/assets/be/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- footable CSS -->
    <link href="/assets/be/vendor/footable-bootstrap/css/footable.bootstrap.min.css" rel="stylesheet">
@endpush
@section('content')
	<!-- Begin page content -->
	<main class="flex-shrink-0">
	    <div class="container-fluid" id="main-container">
	        <div class="row mb-4">
	            <div class="container py-4">
	                <div class="row">
	                    <div class="col">
	                        <h5 class="font-weight-normal template-primary">Riders</h5>
	                        <p class="text-secondary mb-0">All registered riders</p>
	                    </div>
	                    <div class="col-auto align-self-center">
	                        <button type="button" class="btn btn-primary mb-2 btn-success text-uppercase" data-toggle="modal" data-target="#exampleModal">
	                            <i class="material-icons md-18 mr-1">add</i> rider
	                        </button>
	                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	                            <div class="modal-dialog modal-lg" role="document">
	                                <div class="modal-content">
	                                    <div class="modal-header gradient-pink">
	                                        <h5 class="modal-title" id="exampleModalLabel">New Rider</h5>
	                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                            <span aria-hidden="true">×</span>
	                                        </button>
	                                    </div>
                                        <form action="/rider-add" method="POST" enctype="multipart/form-data">
	                                        @csrf
		                                    <div class="modal-body">
		                                        <div class="row justify-content-center">
		                                            <div class="col-md-10 mx-auto">
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Name</label>                   
		                                                        <div class="input-group mb-1">
		                                                            <input type="text" class="form-control" name="name" placeholder="Name" required>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Login Credentials</label>                   
		                                                        <div class="input-group mb-1">
		                                                            <input type="text" class="form-control" name="email" placeholder="Email" required>
		                                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Contact Info</label>
	                                                            <div class="p-0">
	                                                                <input type="text" class="form-control" name="rider_contact_number[]" placeholder="09201234567" required>
	                                                            </div>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-md-12 col-lg-12">
		                                                        <label>Avatar</label>
		                                                        <input type="file" name="rider_profile_avatar" class="form-control" required>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Home Address</label>                                
		                                                        <div class="input-group mb-1">
		                                                            <textarea class="form-control" name="rider_profile_address" required></textarea>
		                                                        </div>               
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Postal Code</label>
		                                                        <input type="text" class="form-control" placeholder="Postal code" name="rider_profile_zip_code" required>
		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-md-12 col-lg-12">
		                                                        <label>Driver's License (Front and Back)</label>
		                                                        <input type="file" name="rider_profile_drivers_license" class="form-control" required>

		                                                    </div>
		                                                </div>
		                                                <div class="form-group row">
		                                                    <div class="col-lg-12 col-md-12">
		                                                        <label>Vehicle Info</label>
		                                                        <input type="text" class="form-control" placeholder="Plate #" name="rider_profile_vehicle_number" required>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <div class="modal-footer">
		                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		                                        <button type="submit" class="btn btn-success">Save changes</button>
		                                    </div>
		                                </form>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="container">
	                <div class="card border-0 shadow-sm mb-4">
	                    <div class="card-body">
	                        <table class="table table-striped border" id="dataTables-example">
	                            <thead>
	                                <tr>
	                                    <th style="width: 82px">Avatar</th>
	                                    <th>Name</th>
	                                    <th>Status</th>
	                                    <th>Contact</th>
	                                    <th>Vehicle</th>
	                                    <th>License</th>
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($riders as $k => $r)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                	<td>		
		                                		<a href="/profile?ref_id={{$r->id}}">                              		
		                                    	<figure class="avatar avatar-90 rounded-circle mx-auto my-3"><img src="/storage/images/users/{{ $r->rider_profile_avatar }}" alt=""></figure></a>  
		                                	</td>
		                                    <td>
		                                    	{{ $r->name }}
		                                    </td>
		                                    <td>
		                                    	@if($r->status === 'active')
		                                    	<span class="badge badge-success">Active</span>
		                                    	@else
		                                    	<span class="badge badge-danger">Not Active</span>
		                                    	@endif
		                                    </td>
		                                    <td>
		                                        <p class="mb-0">{{ $r->rider_contact_number }}</p>
		                                        <p class="mb-0"><small>{{ $r->rider_profile_zip_code }} : {{ $r->rider_profile_address }}</small></p>
		                                    </td>     
		                                    <td>
		                                        <p class="mb-0">
		                                        	Plate #: {{ $r->rider_profile_vehicle_number }}</p>
		                                        {{--
		                                        	<p class="mb-0">
		                                        	License:<br>                   		
		                                    		<figure class="avatar avatar-100 vm"><img src="/storage/images/users/license/{{ $r->rider_profile_drivers_license }}" alt=""></figure>
		                                        </p>
		                                        --}}
		                                    </td>   
	                                    	<td>
	                                        	<p class="mb-0">           		
	                                    		<figure class="avatar avatar-100 vm"><img src="/storage/images/users/license/{{ $r->rider_profile_drivers_license }}" alt=""></figure>
		                                        </p>
		                                    </td>                 
		                                </tr>
                                    @endforeach
	                            </tbody>
	                        </table>
	                        <!-- /.table-responsive -->
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	</main>
@endsection
@push('scripts')
    <script src="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- DataTable jquery file -->
    <script src="/assets/be/vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="/assets/be/vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- datepicker jquery file -->
    <script src="/assets/be/vendor/bootstrap-daterangepicker-master/moment.js"></script>
    <script src="/assets/be/vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    
    <!-- Dropzone jquery file -->
    <script src="/assets/be/vendor/dropzone-master/dropzone.js"></script>

    <!-- Footable jquery file -->
    <script src="/assets/be/vendor/footable-bootstrap/js/footable.min.js"></script>
	<script>
        'user strict'
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });   

            /* data Table */
            $('#dataTables-example').DataTable({
                responsive: true,
                "order": [
                    [2, "desc"]
                ]
            });

            /* footable  */
            $(".footable").footable({
                "paging": {
                    "enabled": true,
                    "position": "center"
                }
            });
            
            $("#avatarUpload, #dlUpload").dropzone({
                url: "../",
                acceptedFiles: "image/*",
                addRemoveLinks: "dictRemoveFile",
                dictResponseError: " ",
            });
            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901
            }, function(start, end, label) {});
        });   
	</script>
@endpush