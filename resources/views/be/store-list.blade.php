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
	                        <h5 class="font-weight-normal template-primary">Vendor / Store</h5>
	                        <p class="text-secondary mb-0">All registered vendors</p>
	                    </div>
                        <div class="col-auto align-self-center">
                            <button type="button" class="btn btn-primary mb-2 btn-success text-uppercase" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons md-18 mr-1">add</i> vendor / store
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header gradient-pink">
                                            <h5 class="modal-title" id="exampleModalLabel">New Vendor / Store</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="/store-add" method="POST">
	                                        @csrf
	                                        <div class="modal-body">
	                                            <div class="row justify-content-center">
	                                                <div class="col-md-10 mx-auto">
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Name</label>
	                                                            <input type="text" class="form-control" name="vname" placeholder="">
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Business Address</label>                                
	                                                            <div class="input-group mb-1">
	                                                                <input type="text" class="form-control" name="vstreet" placeholder="Street">
	                                                                <input type="text" class="form-control" name="vcity" placeholder="City / Municipality">
	                                                            </div>                                                  
	                                                            <div class="input-group mb-1">
	                                                                <input type="text" class="form-control" name="vprovince" placeholder="Province">
	                                                                <input type="text" class="form-control" name="vcountry" placeholder="Country">
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Contact Info</label>
	                                                            <!-- <span class="btn btn-success btn-sm float-right mb-2"><i class="material-icons icon-right icon">add</i></span> -->
	                                                            <div class="input-group mb-1">
	                                                                <div class="col-sm-12 p-0">
	                                                                    <input type="text" class="form-control" name="contact[]" placeholder="Add # here Ex. 09201234567">
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Business Status</label>
	                                                            <select class="form-control" name="vis_activated">
	                                                            	<option>Select Status</option>	                  
	                                                            	<option value="1">Active</option>	                  
	                                                            	<option value="0">Not Active</option>
	                                                            </select>
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
	                                    <th>Name</th>
	                                    <th>Contact</th>
	                                    <th>Address</th>
	                                    <th>Action</th>
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($stores as $k => $s)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                    <td>
		                                    	{{ $s->vname }}
		                                    </td>
		                                    <td>
		                                        @foreach($s->contact as $k => $_c)
			                                        <p class="mb-0">{{$_c->vc_number}}</p>
		                                        @endforeach
		                                    </td>   
		                                    <td>
		                                    	<p class="mb-0">{{$s->vstreet}} {{$s->vcity}} {{$s->vprovince}} {{$s->vcountry}}</p>
		                                    </td>
		                                    <td class="center"><a href="/store-update/{{$s->vendorid}}" class="btn btn-success px-3 btn-sm">Edit</a></td>
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