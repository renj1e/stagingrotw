@extends('layouts.be')

@section('content')
    <main class="flex-shrink-0">
        <div class="container-fluid" id="main-container">
            <div class="row">
                <div class="banner gradient-template col-12 mb-4 pb-5">
                    <h2 class="text-center my-5 font-weight-light">Hi! Welcome back, OTW Admin</h2>
                </div>
            </div>
            <div class="row">
<!--                 <div class="container top-60">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="mb-0"><span class="subtitle">Total Earning</span></h6>
                                            <p><small class="text-success">P250</small> <small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal text-success mt-2">P 1765</h3>
                                        </div>
                                        <div class="col-auto pl-0 align-self-center">
                                            <div class="progress-circle progress-success" data-value="0.12" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                <strong>86</strong></div>
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
                                            <h6 class="mb-0"><span class="subtitle">Total Visit</span></h6>
                                            <p><small class="text-danger">250</small> <small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal text-danger mt-2">1530</h3>
                                        </div>
                                        <div class="col-auto pl-0 align-self-center">
                                            <div class="progress-circle progress-danger" data-value="0.025" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                <strong>72</strong></div>
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
                                            <p><small class="text-success">245</small> <small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal template-primary mt-1">7230</h3>
                                        </div>
                                        <div class="col-auto pl-0 align-self-center">
                                            <div class="progress-circle progress-warning" data-value="0.35" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                <strong>35</strong></div>
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
                                            <h6 class="mb-0"><span class="subtitle">New Customer</span></h6>
                                            <p><small class="text-success">10%</small> <small class="text-mute">Today</small></p>
                                            <h3 class="font-weight-normal template-primary mt-1">1530</h3>
                                        </div>
                                        <div class="col-auto pl-0 align-self-center">
                                            <div class="progress-circle progress-primary" data-value="0.06" data-size="70" data-thickness="8" data-animation-start-value="0" data-reverse="false">
                                                <strong>6</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

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
                                                <th data-breakpoints="xs sm">Action</th>
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
                                                        <p class="text-mute"><small>{{ $rider->rider_profile_address }}</small></p>
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
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <button class="btn btn-info px-1 btn-sm mr-1 btn-message" data-id="{{ $rider->id }}"><i class="material-icons md-18">message</i></button>
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
                                                        <p class="text-mute" title="{{ $c->castreet }}, {{ $c->cacity }}, {{ $c->caprovince }}"><small>{{ $c->castreet }}, {{ $c->cacity }} @ {{ $c->calabel }}</small></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Confirmed Order </span>
                                                </td>
                                                <!-- <td>
                                                    <small class="text-mute vm">Today</small>
                                                </td> -->
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <button class="btn btn-success px-1 btn-sm mr-1 btn-assign-rider" data-toggle="modal" data-target="#assignRider" data-id="{{ $c->order_trackid }}"><i class="material-icons md-18">person_add</i></button>
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
<!--                 <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-header">
                                    <h6 class="card-title">Statistics Overview this year 2020</h6>
                                </div>
                                <div class="card-header p-0 border-0">
                                    <ul class="nav nav-tabs border-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tabhome121-tab" data-toggle="tab" href="#tabhome121" role="tab" aria-controls="tabhome121" aria-selected="true">
                                                <h3 class="font-weight-normal">100</h3>
                                                <p class="template-primary text-uppercase mb-0">Visitors</p>
                                                <small class="text-secondary"><span class="text-success">+ 10%</span> <span class="text-mute">increased</span></small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabhome221-tab" data-toggle="tab" href="#tabhome221" role="tab" aria-controls="tabhome221" aria-selected="false">
                                                <h3 class="font-weight-normal">90</h3>
                                                <p class="template-primary text-uppercase mb-0">Orders</p>
                                                <small class="text-secondary"><span class="text-success">+ 15%</span> <span class="text-mute">increased</span></small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabhome321-tab" data-toggle="tab" href="#tabhome321" role="tab" aria-controls="tabhome321" aria-selected="false">
                                                <h3 class="font-weight-normal">100</h3>
                                                <p class="template-primary text-uppercase mb-0">Delivered</p>
                                                <small class="text-secondary"><span class="text-success">+ 90%</span> <span class="text-mute">completed</span></small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabhome121" role="tabpanel" aria-labelledby="tabhome121-tab">
                                            <canvas id="linechart2" style="height: 200px;"></canvas>
                                        </div>
                                        <div class="tab-pane fade" id="tabhome221" role="tabpanel" aria-labelledby="tabhome221-tab">
                                            <h6>Tab 2</h6>
                                            <p>OTW is HTML template based
                                                on Bootstrap 4.3.1 framework. This html template can be used in
                                                various business domains like Manufacturing, inventory, IT,
                                                administration etc. for admin panel, system development, web
                                                applications, even website can be created. This template also
                                                considered social pages, ecommerce pages and many more. </p>
                                        </div>
                                        <div class="tab-pane " id="tabhome321" role="tabpanel" aria-labelledby="tabhome321-tab">
                                            <h6>Tab 3</h6>
                                            <p>OTW is HTML template based
                                                on Bootstrap 4.3.1 framework. This html template can be used in
                                                various business domains like Manufacturing, inventory, IT,
                                                administration etc. for admin panel, system development, web
                                                applications, even website can be created. This template also
                                                considered social pages, ecommerce pages and many more. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> -->

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
					...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary">Assign</button>
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
@endpush