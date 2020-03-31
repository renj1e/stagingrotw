@extends('layouts.rider')

@push('styles')

@endpush
@section('content')
    <main class="flex-shrink-0">
        <div class="container-fluid" id="main-container">

            <div class="row">
                <div class="container-fluid">

                    <div class="row row-height" style="height: 617px;">
                        <div class="col-10 col-md-8 col-lg-12 col-xl-12 mx-auto text-center align-self-center">
                            <h1 class="display-4 ">Page is not accessible! </h1>
                            <p class="lead mb-4 text-mute-high">Please contact your OTW Admin</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
@endsection
@push('scripts')
    <script>
        'user strict'
        $(document).ready(function() {

        });   
    </script>
@endpush