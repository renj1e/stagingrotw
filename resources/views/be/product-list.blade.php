@extends('layouts.be')

@push('styles')
    <!-- dataTable CSS -->
    <link href="/assets/be/vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!--     <link href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet"> -->



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
	                        <h5 class="font-weight-normal template-primary">Products</h5>
	                        <p class="text-secondary mb-0">All registered products</p>
	                    </div>

                        <div class="col-auto align-self-center">
                            <button type="button" class="btn btn-primary mb-2 btn-success text-uppercase" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons md-18 mr-1">add</i> product
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header gradient-pink">
                                            <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="/product-add" method="POST" enctype="multipart/form-data">
                                        	@csrf
	                                        <div class="modal-body">
	                                            <div class="row justify-content-center">
	                                                <div class="col-md-10 mx-auto">
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Product name</label>
	                                                            <input type="text" name="mname" class="form-control" placeholder="">
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-6 col-md-6">
	                                                            <label>Vendor</label>
	                                                            <select class="form-control" name="vendorid">
	                                                                <option>Select Vendor</option>
	                                                                @foreach($vendors as $v)
	                                                                <option value="{{ $v->vendorid }}">{{ $v->vname }}</option>
	                                                                @endforeach
	                                                            </select>
	                                                        </div>
	                                                        <div class="col-lg-6 col-md-6">
	                                                            <label>Types of Meal</label>
	                                                            <div class="">
	                                                                <div class="custom-control mb-2 custom-checkbox custom-control-inline">
	                                                                    <input type="checkbox" class="custom-control-input" name="mtype[]" value="1" id="all-time">
	                                                                    <label class="custom-control-label" for="all-time">All time</label>
	                                                                </div>
	                                                                <div class="custom-control mb-2 custom-checkbox custom-control-inline">
	                                                                    <input type="checkbox" class="custom-control-input" name="mtype[]" value="2" id="breakfast">
	                                                                    <label class="custom-control-label" for="breakfast">Breakfast</label>
	                                                                </div>
	                                                                <div class="custom-control mb-2 custom-checkbox custom-control-inline">
	                                                                    <input type="checkbox" class="custom-control-input" name="mtype[]" value="3" id="Lunch">
	                                                                    <label class="custom-control-label" for="Lunch">Lunch</label>
	                                                                </div>
	                                                                <div class="custom-control mb-2 custom-checkbox custom-control-inline">
	                                                                    <input type="checkbox" class="custom-control-input" name="mtype[]" value="4" id="dinner">
	                                                                    <label class="custom-control-label" for="dinner">Dinner</label>
	                                                                </div>
	                                                                <div class="custom-control mb-2 custom-checkbox custom-control-inline">
	                                                                    <input type="checkbox" class="custom-control-input" name="mtype[]" value="5" id="merienda">
	                                                                    <label class="custom-control-label" for="merienda">Merienda</label>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-12 col-md-12">
	                                                            <label>Description</label>
	                                                            <textarea class="form-control" placeholder="" id="editor" name="mdesc"></textarea>
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group row">
	                                                        <div class="col-lg-6 col-md-6">
	                                                            <label>Price per order (Php)</label>
	                                                            <input type="number" class="form-control" placeholder="" name="mprice">
	                                                        </div>
	                                                        <div class="col-lg-6 col-md-6">
	                                                            <label># of stacks</label>
	                                                            <input type="number" class="form-control" placeholder="" name="mquantity">
	                                                        </div>
	                                                    </div>
	                                                    {{--
	                                                    <div class="form-group row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <label>Add-ons: </label>
	                                                            <div id="addons"> 
	                                                            <p class="mb-0">No add-ons</p>                                          
	                                                            </div>
                                                            </div>
                                                        </div>--}}
	                                                    <br>
	                                                    <div class="form-group row">
	                                                        <div class="col-md-12">
	                                                            <label>Display Photo</label>
	                                                            <input type="file" class="form-control" name="mavatar" placeholder="Photo upload">
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
	                                    <th style="width: 82px">Photo</th>
	                                    <th>Menu / Vendor</th>
	                                    <th>Price</th>
	                                    <th>Actions</th>
	                                </tr>
	                            </thead>
	                            <tbody>

                                    @foreach($menu as $k => $m)
		                                <tr class="{{ ($k % 2 === 0)? 'even':'odd' }}">
		                                    <td>
		                                    	<figure class="avatar avatar-100 vm"><img src="/storage/images/{{ $m->mavatar }}" alt=""></figure>
		                                    </td>
		                                    <td>
		                                        <p class="mb-0"><span>{{ $m->mname }}</span></p>		                                        
			                                    <p class="mb-0"> <small>Meal type: </small>
			                                    	@foreach($m->mt as $type)
	                                                    @switch($type)
	                                                        @case('1')
	                                                            <span class="badge badge-success">All time meal </span> 
	                                                        @break
	                                                        @case('2')
	                                                            <span class="badge badge-success">Breakfast </span> 
	                                                        @break
	                                                        @case('3')
	                                                            <span class="badge badge-success">Lunch</span> 
	                                                        @break
	                                                        @case('4')
	                                                            <span class="badge badge-success">Dinner </span> 
	                                                        @break
	                                                        @case('5')
	                                                            <span class="badge badge-success">Merienda </span> 
	                                                        @break

	                                                        @default
	                                                        @break
	                                                    @endswitch
			                                    	@endforeach
			                                    </p>
		                                        <hr/>
	                                        	@if(isset($m->addon_menu))
			                                        <p class="mb-0"> <small>Add-ons:</small>
				                                        @foreach($m->addon_menu as $_k => $_a)
					                                        <span class="font-weight-bold">{{$_a->am_name}} (P{{$_a->am_price}}) {{(count($m->addon_menu) !== ($_k + 1))? ',' : ''}}</span>
				                                        @endforeach
				                                    </p>
		                                        @endif
		                                        <p class="mb-0"><span>{{ $m->mdesc }}</span></p>
		                                        <hr/>
		                                        <p class="mb-0"><span>Vendor: {{ $m->vendor->vname }}</span></p>
		                                        <p class="mb-0">
		                                        	<span>Vendor #:</span>
		                                        	<span>{{ $m->mname }}</span>
		                                        </p>
		                                        <p class="mb-0"><span>Address: {{ $m->vendor->vstreet }}, {{ $m->vendor->vcity }}, {{ $m->vendor->vprovince }}</span></p>
		                                    </td>
		                                    <td>
		                                    	<p class="mb-0">P{{ $m->mprice }}</p>
		                                    </td>   
		                                    <td class="center">
		                                    	<a href="/product-update/{{$m->menuid}}" class="btn btn-success px-3 btn-sm">Edit</a>
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
<!--     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script> -->


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

		    $('select[name="vendorid"]').change(function(e){
		        e.preventDefault();
		        var id = e.target.value;
				$.ajax({
					type: 'POST',
					url: '/getvendoraddons',
					data: {id: id},
					dataType: 'json',
					success:function(data){
						$('#addons').empty();
						if(data.length > 0)
						{
							$.each(data, function(i, v){
								$('#addons').append('<div class="custom-control mb-2 custom-checkbox custom-control-inline">'+
										'<input type="checkbox" class="custom-control-input" name="maddons['+data[i].amid+']" value="1" id="addons-'+data[i].amid+'">'+
										'<label class="custom-control-label" for="addons-'+data[i].amid+'">'+data[i].am_name+' (P'+data[i].am_price+')</label>'+
									'</div>');
							});
						}
						else
						{
							$('#addons').append('<p class="mb-0">No add-ons</p>');
						}
					},
					error:function(data){
					  console.log(data);
					}
				});
		    });



            /* data Table */
            $('#dataTables-example').DataTable({
		        // dom: 'Bfrtip',
		        // buttons: [
		        //     'colvis'
		        // ],
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