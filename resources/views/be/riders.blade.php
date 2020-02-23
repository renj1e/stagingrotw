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
                                    <h6 class="card-title">Active Riders</h6>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table  footable" data-paging-limit="3">
                                        <thead>
                                            <tr>
                                                <th>Rider name</th>
                                                <th data-breakpoints="xs">Phone</th>
                                                <th data-breakpoints="xs sm">Status</th>
                                                <th data-breakpoints="xs sm"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        	@foreach($orders as $o)
                                            <tr>
                                                <td>
                                                    <figure class="avatar avatar-30 mr-2 vm">
                                                        <img src="/assets/be/img/user5.jpg" alt="Generic placeholder image">
                                                    </figure>
                                                    <div class="d-inline-block vm">
                                                        <p class="my-0 template-primary">Ananya Pachoti</p>
                                                        <p class="text-mute"><small>Alaminos City, Pangasinan</small></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-mute vm">+000000000</small>
                                                </td>
                                                <td>
                                                    <small class="text-mute vm">Waiting...</small>
                                                </td>
                                                <td class="text-right footable-last-visible" style="display: table-cell;">
                                                    <button class="btn btn-info px-1 btn-sm mr-1"><i class="material-icons md-18">edit</i></button>
                                                    <button class="btn btn-success px-1 btn-sm"><i class="material-icons md-18">call</i></button>
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