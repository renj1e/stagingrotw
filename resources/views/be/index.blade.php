@extends('layouts.be')

@section('content')
    <main class="flex-shrink-0">
        <div class="container-fluid" id="main-container">
            <div class="row">
                <div class="banner gradient-template col-12 mb-4 pb-1">
                    <h2 class="text-center my-2 font-weight-light">Hi! Welcome back, OTW Admin</h2>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">                                
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header">
                                    <h6 class="card-title">Today's Riders</h6>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table  footable" data-paging-limit="3">
                                        <thead>
                                            <tr>
                                                <th>Rider name</th>
                                                <th data-breakpoints="xs">Phone</th>
                                                <th data-breakpoints="xs sm">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($riders as $rider)
                                            <tr>
                                                <td>
                                                    <figure class="avatar avatar-30 mr-2 vm">
                                                        <img src="/assets/be/img/user5.jpg" alt="Generic placeholder image">
                                                    </figure>
                                                    <div class="d-inline-block vm">
                                                        <p class="my-0 template-primary">{{ $rider->name }}</p>
                                                        <p class="text-mute"><small>Area: {{ $rider->rider_profile_zip_code }} - {{ $rider->rider_profile_address }}</small></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-mute vm">{{ $rider->rider_contact_number }}</small>
                                                </td>
                                                <td>
						                            @switch($rider->rider_status_status)
						                                @case('hired')
						                                    <small class="text-success vm">Hired</small>
						                                @break
						                                @default
						                                    <small class="text-danger vm">Waiting...</small>
						                                @break
						                            @endswitch
                                                </td>
                                            </tr>
                                        	@endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>                                
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header">
                                    <h6 class="card-title">Customer's Orders</h6>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table  footable" data-paging-limit="3">
                                        <thead>
                                            <tr>
                                                <th>Customer name</th>
                                                <th data-breakpoints="xs">Order</th>
                                                <!-- <th data-breakpoints="xs sm">Last visit</th> -->
                                                <th data-breakpoints="xs sm">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($customers as $c)
                                            <tr>
                                                <td>
                                                    <figure class="avatar avatar-30 mr-2 vm">
                                                        <img src="/assets/be/img/user2.jpg" alt="Generic placeholder image">
                                                    </figure>
                                                    <div class="d-inline-block vm">
                                                        <p class="my-0 template-primary">{{ $c->name }}</p>
                                                        <p class="text-mute" title="{{ $c->castreet }}, {{ $c->cacity }}, {{ $c->caprovince }}"><small>{{ $c->castreet }}, {{ $c->cacity }} {{ $c->cazipcode }} @ {{ $c->calabel }}</small></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    @switch($c->order_trackstatus)
                                                        @case('order_confirmed_and_received')
                                                            <span class="badge badge-success">Confirmed Order </span>
                                                        @break
                                                        @case('processing')
                                                            <span class="badge badge-success">Processing </span>
                                                        @break
                                                        @case('purchased')
                                                            <span class="badge badge-success">Purchased </span>
                                                        @break
                                                        @case('otw')
                                                            <span class="badge badge-success">On the way </span>
                                                        @break
                                                        @case('delivered')
                                                            <span class="badge badge-success">delivered </span>
                                                        @break

                                                        @default
                                                        @break
                                                    @endswitch
                                                </td>
                                                <!-- <td>
                                                    <small class="text-mute vm">Today</small>
                                                </td> -->
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <button class="btn btn-success px-1 btn-sm mr-1 btn-assign-rider" data-toggle="modal" data-target="#assignRider" data-id="{{ $c->order_trackid }}" data-zcode="{{ $c->cazipcode }}">Assign</button>
                                                </td>
                                            </tr>
                                        	@endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

	    <!-- MODALS -->
		<div class="modal fade" id="assignRider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Assign to Rider</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-assign">
							<input type="hidden" name="otid" value>
							<div id="riders"></div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary btn-assign-rider-modal">Assign</button>
					</div>
				</div>
			</div>
		</div>
	    <!-- /MODALS -->

    </main>
@endsection

@push('scripts')
<!-- Circular Progress -->
<script src="/assets/be/vendor/circle-progress/circle-progress.min.js"></script>

<!-- Sparklines Progress -->
<script src="/assets/be/vendor/sparklines/jquery.sparkline.min.js"></script>

<!-- Chart Progress -->
<script src="/assets/be/vendor/chartjs/Chart.min.js"></script>
<script src="/assets/be/vendor/chartjs/utils.js"></script>
<script src="/assets/be/js/dashboard.js"></script>
	<script>
        'user strict'
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });   
            $('button.btn-assign-rider').click(function(e){
                var id = $(this).data('id')
                var zcode = $(this).data('zcode')
                if(id && zcode)
                {
                    $.ajax({
                        type: 'GET',
                        url: '/get-all-riders-by-zip-code/'+id+'/'+zcode,
                        dataType: 'json',
                        success:function(riders){
                        	console.log(riders)
                        	$('#riders').empty();
                        	$('[name="otid"]').prop('value', id);
							for ( var i = 0, l = riders.length; i < l; i++ ) {

                                $('#riders').append('<div class="custom-control custom-radio">'+
                                    '<input type="radio" name="rider" value="'+riders[i].id+'" class="custom-control-input" id="rider-'+i+'">'+
                                    '<label class="custom-control-label" for="rider-'+i+'"><span class="font-weight-bold">'+riders[i].name+'</span> : Area : <span>'+riders[i].rider_profile_zip_code+'</span> <span>'+riders[i].rider_profile_address+'</span></label>'+
                                '</div>');
							}
                        },
                        error:function(data){
                          console.log(data);
                        }
                    });
                }
            })
            $('button.btn-assign-rider-modal').click(function(e){
		    	e.preventDefault(); 
		    	var data = $('#form-assign').serializeArray();
		        $.ajax({
		           type: 'POST',
		           url: '/assign-order-to-rider',
		           data: data,
		           dataType: 'json',
		           success:function(data){
			           	console.log(data)
	                    location.reload(true);
		           },
		           error:function(data){
		              console.log(data);
		           }
		        });
            })

        // $('.btn-remove-address').on('click',function(e){
        //     e.preventDefault();
        //     var id = $(this).data('item-id');          
        // });
        });
	</script>
@endpush