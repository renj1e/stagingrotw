@extends('layouts.rider')

@section('content')
    <main class="flex-shrink-0">
        <div class="container-fluid" id="main-container">
            <div class="row">
                <div class="banner gradient-template col-12 mb-4 pb-1">
                    <h2 class="text-center my-2 font-weight-light">Hi! Welcome back, OTW Rider</h2>
                </div>
            </div>
			<div class="row">
				<div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control select-rider-status" data-live-search="true" tabindex="-1" aria-hidden="true">
                                @switch($order->order_trackstatus)
                                    @case('order_confirmed_and_received')
                                        <option value="order_confirmed_and_received">Confirmed Order </option>
                                    @break
                                    @case('processing')
                                        <option value="processing">Processing </option>
                                    @break
                                    @case('purchased')
                                        <option value="purchased">Purchased </option>
                                    @break
                                    @case('otw')
                                        <option value="otw">On the way </option>
                                    @break
                                    @case('delivered')
                                        <option value="delivered">delivered </option>
                                    @break

                                    @default
                                    @break
                                @endswitch

                                <option>-- Select order status here --</option>
                                <option value="order_confirmed_and_received">Confirmed Order </option>
                                <option value="processing">Processing </option>
                                <option value="purchased">Purchased </option>
                                <option value="otw">On the way </option>
                                <option value="delivered">delivered </option>
                            </select><br/>
                        </div>                        
                    </div>
                </div>
			    <div class="container">
			        <div class="card border-0 shadow-sm mb-4">
			            <div class="card-header border-0">
			                <h6>Order from {{$order->name}}. Deliver to ({{$order->calabel}}) {{$order->castreet}}, {{$order->cacity}}, {{$order->caprovince}} {{$order->cazipcode}} </h6>
			            </div>
			            <div class="card-body p-0">
			                <table class="table footable">
			                    <tbody>
			                    	@foreach($order->orders as $o)
			                        <tr>
			                            <td>
			                                <div class="media">
			                                    <div class="icons icon-circle icon-40 text-primary bg-light-primary mr-3">
			                                        <i class="material-icons">business</i>
			                                    </div>
			                                    <div class="media-body">
			                                        <h6 class="my-0 mt-1">{{ $o->vname }}</h6>
			                                        <p class="small">{{ $o->vstreet }}, {{ $o->vcity }}, {{ $o->vprovince }}</p>
			                                    </div>
			                                </div>
			                            </td>
			                            <td>
			                                <h6 class="my-0 mt-1">{{ $o->orderquantity }} x {{ $o->mname }} (P{{ $o->mprice }})</h6>
			                            </td>
			                            <td class="text-center">
                                            @foreach($o->addons as $a)
                                                <span class="btn btn-rounded btn-outline-success px-3 btn-sm">{{ $a->q }} x {{ $a->addname }} P{{ $a->addprice }}</span>
                                                <br/>
                                            @endforeach
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
@endsection

@push('scripts')
	<script>
        'user strict'
        $(document).ready(function() {
        });
	</script>
@endpush