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
	                                    <div class="modal-body">

	                                        <div class="row justify-content-center">
	                                            <div class="col-md-10 mx-auto">
	                                                <div class="form-group row">
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <label>Name</label>                   
	                                                        <div class="input-group mb-1">
	                                                            <input type="text" class="form-control" placeholder="First Name">
	                                                            <input type="text" class="form-control" placeholder="Middle Name">
	                                                            <input type="text" class="form-control" placeholder="Last Name">
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <label>Login Credentials</label>                   
	                                                        <div class="input-group mb-1">
	                                                            <input type="text" class="form-control" placeholder="Username">
	                                                            <input type="password" class="form-control" placeholder="Password">
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-md-12 col-lg-12">
	                                                        <label>Avatar</label>
	                                                        <br>
	                                                        <div class="custom-dropzone text-center align-items-center" id="avatarUpload">
	                                                            <div class="dz-default dz-message" data-dz-message="">
	                                                                <h3 class="mt-2"><i class="material-icons md-36">cloud_download</i></h3>
	                                                                <p>Drop here or click here to upload</p>
	                                                            </div>
	                                                        </div>

	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <label>Home Address</label>                                
	                                                        <div class="input-group mb-1">
	                                                            <input type="text" class="form-control" placeholder="Street">
	                                                            <input type="text" class="form-control" placeholder="City / Municipality">
	                                                        </div>                                                  
	                                                        <div class="input-group mb-1">
	                                                            <input type="text" class="form-control" placeholder="Province">
	                                                            <input type="text" class="form-control" placeholder="Country">
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <label>Contact Info</label>
	                                                        <span class="btn btn-success btn-sm float-right mb-2"><i class="material-icons icon-right icon">add</i></span>
	                                                        <div class="input-group mb-1">
	                                                            <div class="col-lg-4 col-md-4 p-0">
	                                                                <select class="form-control">
	                                                                    <option>Select</option>
	                                                                    <optgroup label="Social Media" >
	                                                                        <option>Facebook</option>
	                                                                        <option>Instagram</option>
	                                                                    </optgroup>
	                                                                    <optgroup label="Other" >
	                                                                        <option>Mobile</option>
	                                                                        <option>Landline</option>
	                                                                    </optgroup>
	                                                                </select>
	                                                            </div>
	                                                            <div class="col-lg-8 col-md-8 p-0">
	                                                                <input type="text" class="form-control" placeholder="1234567890 or (https://www/facebook/com/urname)">
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-md-12 col-lg-12">
	                                                        <label>Driver's License (Front and Back)</label>
	                                                        <br>
	                                                        <div class="custom-dropzone text-center align-items-center" id="dlUpload">
	                                                            <div class="dz-default dz-message" data-dz-message="">
	                                                                <h3 class="mt-2"><i class="material-icons md-36">cloud_download</i></h3>
	                                                                <p>Drop here or click here to upload</p>
	                                                            </div>
	                                                        </div>

	                                                    </div>
	                                                </div>
	                                                <div class="form-group row">
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <label>Vehicle Info</label>
	                                                        <span class="btn btn-success btn-sm float-right mb-2"><i class="material-icons icon-right icon">add</i></span>
	                                                        <div class="input-group mb-1">
	                                                            <div class="col-lg-4 col-md-4 p-0">
	                                                                <select class="form-control">
	                                                                    <option>Select</option>
	                                                                    <option>Motorcycle</option>
	                                                                    <option>Tricycle</option>
	                                                                    <option>4 Wheels etc...</option>
	                                                                </select>
	                                                            </div>
	                                                            <div class="col-lg-8 col-md-8 p-0">
	                                                                <input type="text" class="form-control" placeholder="Plate #">
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="modal-footer">
	                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                                        <button type="button" class="btn btn-success">Save changes</button>
	                                    </div>
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
	                                    <th>Name</th>
	                                    <th>Contact</th>
	                                    <th>Vehicle</th>
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($riders as $k => $r)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                    <td>
		                                    	{{ $r->name }}
		                                    </td>
		                                    <td>
		                                        <p class="mb-0">{{ $r->rider_contact_number }}</p>
		                                        <p class="mb-0"><small>{{ $r->rider_profile_zip_code }} : {{ $r->rider_profile_address }}</small></p>
		                                    </td>     
		                                    <td>
		                                        <p class="mb-0">
                                                    @switch($r->rider_profile_vehicle_type)
                                                        @case('motorcycle')
                                                            <span class="badge badge-success">Motorcycle </span> 
                                                        @break
                                                        @case('tricycle')
                                                            <span class="badge badge-success">Tricycle </span> 
                                                        @break
                                                        @case('delivery_van')
                                                            <span class="badge badge-success">Delivery Van </span> 
                                                        @break
                                                        @case('others')
                                                            <span class="badge badge-success">Others </span> 
                                                        @break

                                                        @default
                                                        @break
                                                    @endswitch
                                                    : {{ $r->rider_profile_vehicle_number }}</p>
		                                        <p class="mb-0">
		                                        	License: {{ $r->rider_profile_drivers_license }}
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