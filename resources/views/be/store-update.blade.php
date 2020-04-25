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
	                        <p class="text-secondary mb-0">Vendor / Store update form</p>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="row">
	            <div class="container">
	                <div class="card border-0 shadow-sm mb-4">
	                    <div class="card-body">

                            <form action="/store-save-update" method="POST">
                                @csrf
                                <input type="hidden" name="vendorid" value="{{$store->vendorid}}">
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mx-auto">
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="vname" value="{{$store->vname}}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Business Address</label>                                
                                                    <div class="input-group mb-1">
                                                        <input type="text" class="form-control" name="vstreet" value="{{$store->vstreet}}" placeholder="Street">
                                                        <input type="text" class="form-control" name="vcity" value="{{$store->vcity}}" placeholder="City / Municipality">
                                                    </div>                                                  
                                                    <div class="input-group mb-1">
                                                        <input type="text" class="form-control" name="vprovince" value="{{$store->vprovince}}" placeholder="Province">
                                                        <input type="text" class="form-control" name="vcountry" value="{{$store->vcountry}}" placeholder="Country">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Contact Info</label>
                                                    <div class="input-group mb-1">
                                                        @foreach($store->contact as $c)
                                                            <div class="col-sm-4 p-0">
                                                                <input type="text" class="form-control" name="contact[{{$c->vcid}}]" value="{{$c->vc_number}}" placeholder="09201234567">
                                                            </div>
                                                        @endforeach

                                                        <div class="col-sm-4 p-0">
                                                            <input type="text" class="form-control" name="contact[]"  placeholder="Add # here 09201234567">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label>Business Status</label>
                                                    <select class="form-control" name="vis_activated">
                                                    	<option>Select Status</option>	                  
                                                    	<option value="1" {{ ($store->vis_activated === 1)? 'selected' : ''}}>Active</option>	
                                                    	<option value="0" {{ ($store->vis_activated === 0)? 'selected' : ''}}>Not Active</option>
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
	</main>
@endsection
@push('scripts')
    <script src="/assets/be/vendor/malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>

	<script>
        'user strict'
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });   
        });   
	</script>
@endpush