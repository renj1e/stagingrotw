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
	                        <h5 class="font-weight-normal template-primary">Customers</h5>
	                        <p class="text-secondary mb-0">All registered customers</p>
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
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($customers as $k => $c)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                    <td>
		                                    	{{ $c->name }}
		                                    </td>
		                                    <td>
		                                        <p class="mb-0"><small>{{ $c->email }} : Member since {{ date_format(date_create($c->created_at), 'M d, Y h:i A')}}</small></p>
		                                        @foreach($c->contacts as $_c)
			                                        <p class="mb-0"><span class="font-weight-bold">{{$_c->conlabel}}</span>: {{$_c->connumber}}</p>
		                                        @endforeach
		                                    </td>   
		                                    <td>
		                                        @foreach($c->address as $_a)
			                                        <p class="mb-0"><span class="font-weight-bold">{{$_a->calabel}}</span>: {{$_a->cazipcode}} : {{$_a->castreet}} {{$_a->cacity}} {{$_a->caprovince}} {{$_a->cacountry}}</p>
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