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
	                        <h5 class="font-weight-normal template-primary">Orders</h5>
	                        <p class="text-secondary mb-0">All Delivered Orders</p>
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
	                                    <th>Customer</th>
	                                    <th>Rider</th>
	                                    <th>Products</th>
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($orders as $k => $o)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                    <td>
		                                    	<p class="mb-0">{{ $o->name }}</p>
		                                    	<p class="mb-0">{{ '@' . $o->calabel }} ({{ $o->cazipcode }}): {{ $o->castreet }}, <br/> {{ $o->cacity }}, {{ $o->caprovince }}</p>
		                                    </td>
		                                    <td>
		                                    	<p class="mb-0">{{ $o->rider->name }}</p>
		                                    	<p class="mb-0"><small>Contact #:</small> {{ $o->rider_contact_number }}</p>
		                                    	<p class="mb-0"> <small>Plate #:</small> {{ $o->rider_profile_vehicle_number }}</p>
		                                    </td>
		                                    <td>
			                                    @foreach($o->orders as $_o)
			                                    	<p class="mb-0">
			                                    		{{ $_o->orderquantity }}X {{ $_o->mname }} - P{{ $_o->mprice }}
			                                    	</p>
			                                    	<p class="mb-0">
			                                    		<small>Date Ordered / Delivered: <b>{{ date('M d, Y H:i A', strtotime($_o->created_at)) }}</b> / <b>{{ date('M d, Y H:i A', strtotime($_o->updated_at)) }}</b></small>
			                                    	</p>
			                                    	<hr class="mt-0"/>
			                                    @endforeach
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