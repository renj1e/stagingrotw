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
                                @switch($status->rider_status_status)
                                    @case('hired')
                                        <option value="hired">Hired</option>
                                    @break
                                    @case('waiting')
                                        <option value="waiting">Waiting to take orders</option>
                                    @break
                                    @case('not_active')
                                        <option value="not_active">Not for hire</option>
                                    @break

                                    @default
                                    @break
                                @endswitch

                                <option>-- Select your status here --</option>
                                <option value="hired">Hired</option>
                                <option value="waiting">Waiting to take orders</option>
                                <option value="not_active">Not for hire</option>
                            </select><br/>
                        </div>                        
                    </div>
                </div>
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0"><span class="subtitle">Total Earning</span></h6>
                                            <p><small class="text-mute">This Month</small></p>
                                            <h3 class="font-weight-normal text-success mt-2">P 1765</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0"><span class="subtitle">Total Earning</span></h6>
                                            <p><small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal text-danger mt-2">P 1530</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0"><span class="subtitle">Order Received</span></h6>
                                            <p><small class="text-mute">This Month</small></p>
                                            <h3 class="font-weight-normal template-primary mt-1">720</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0"><span class="subtitle">Order Received</span></h6>
                                            <p><small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal template-primary mt-1">30</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="container">
                    <div class="row">                                
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header">
                                    <h6 class="card-title">Assigned Orders 
                                    </h6>
                                </div>
                                <div class="card-body p-0 table-responsive">
                                    <table class="table footable" data-paging-limit="3">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <!-- <th data-breakpoints="xs">Orders</th> -->
                                                <th data-breakpoints="xs" class="text-center">Status</th>
                                                <th data-breakpoints="xs" class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($orders as $l)
                                            <tr>
                                                <td colspan="1">
                                                    <figure class="avatar avatar-30 mr-2 vm">
                                                        <img src="/assets/be/img/user5.jpg" alt="Generic placeholder image">
                                                    </figure>
                                                    <div class="d-inline-block vm">
                                                        <p class="my-0 template-primary">{{ $l->name }}</p>
                                                        <p class="text-mute"><small>({{$l->calabel}}) {{$l->castreet}}, {{$l->cacity}}, {{$l->caprovince}} {{$l->cazipcode}}</small></p>
                                                    </div>
                                                </td>

                                                {{--
                                                    <td>
                                                    @foreach($l->orders as $o)
                                                        <p>
                                                            <span>{{ $o->vname }} <br/> {{ $o->vstreet }}, {{ $o->vcity }}, {{ $o->vprovince }}</span>
                                                            <br/>
                                                            <span>{{ $o->orderquantity }} x {{ $o->mname }} (P{{ $o->mprice }})</span>
                                                            <br/>
                                                            <small class="text-mute vm">Add-ons:</small>
                                                            <br/>
                                                            @foreach($o->addons as $a)
                                                                <small class="text-mute vm">{{ $a->q }} x {{ $a->addname }} P{{ $a->addprice }}</small>
                                                                <br/>
                                                            @endforeach
                                                        </p>
                                                    @endforeach
                                                </td>--}}

                                                <td class="text-center">
                                                    @switch($l->order_trackstatus)
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
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <a href="/view-order/{{$l->order_trackid}}" class="btn btn-info px-1 btn-sm mr-1"> <span>View</span></a>
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
    </main>
@endsection

@push('scripts')
    <!-- Circular Progress -->
    <script src="/assets/be/vendor/circle-progress/circle-progress.min.js"></script>

	<script>
        'user strict'
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });   
            $('select.select-rider-status').change(function(e){
                var status = e.target.value
                if(status)
                {
                    $.ajax({
                        type: 'POST',
                        url: '/rider-change-status',
                        data: {status: status},
                        dataType: 'json',
                        success:function(data){
                            console.log(data)
                        },
                        error:function(data){
                          console.log(data);
                        }
                    });
                }
            })

        // $('.btn-remove-address').on('click',function(e){
        //     e.preventDefault();
        //     var id = $(this).data('item-id');          
        // });
        });
	</script>
@endpush