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
                </div>
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
                                                <th data-breakpoints="xs">Orders</th>
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
                                                        <p class="text-mute"><small>({{$l->calabel}}) {{$l->castreet}}, {{$l->cacity}}, {{$l->caprovince}}</small></p>
                                                    </div>
                                                </td>
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
                                                </td>
                                                <td class="text-center"><span class="badge badge-success">Confirmed Order </span></td>
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <button class="btn btn-success px-1 btn-sm mr-1 btn-assign-rider" data-toggle="modal" data-target="#assignRider" data-id="1"><i class="material-icons md-18">thumb_up</i> <span>Accept</span></button>
                                                    <button class="btn btn-danger px-1 btn-sm mr-1 btn-assign-rider" data-toggle="modal" data-target="#assignRider" data-id="1"><i class="material-icons md-18">thumb_down</i> <span>Decline</span></button>
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

        });
	</script>
@endpush