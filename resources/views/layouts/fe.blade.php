<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'On The Way') }}</title>

    <link rel="shortcut icon" href="/assets/fe/images/favicon.png" type="image/x-icon">  
    <link rel="stylesheet" href="/assets/fe/css/icons.min.css">
    <link rel="stylesheet" href="/assets/fe/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fe/css/animate.min.css">
    <link rel="stylesheet" href="/assets/fe/css/main.css">
    <link rel="stylesheet" href="/assets/fe/css/red-color.css">
    <link rel="stylesheet" href="/assets/fe/css/yellow-color.css">
    <link rel="stylesheet" href="/assets/fe/css/responsive.css">
    <link rel="stylesheet" href="/assets/fe/css/plugins.css">
</head>
<body itemscope>
    <div id="app">
        <main>
            <div class="preloader">
                <div id="cooking">
                    <div id="area">
                        <div id="sides">
                            <div id="pan"></div>
                            <div id="handle"></div>
                        </div>
                        <div id="pancake">
                            <div id="pastry"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        {{-- Notification Box --}}
        @include('_partials.FE-topnav')

        @yield('content')

        <div class="footer-label">   
            <div class="cart-added-notifs">
            </div>       
            <div>
                <img class="left-scooty-mockup hidden-sm hidden-xs" src="/assets/fe/images/resource/restaurant-mockup1.png" alt="restaurant-mockup1.png" itemprop="image">
            </div>
            <!-- <img class="bottom-clouds-mockup hidden-sm hidden-xs" src="/assets/fe/images/resource/clouds2.png" alt="clouds.png" itemprop="image"> -->
        </div>

        <div class="log-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="log-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN IN</h4>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="sign-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="siemail" type="email" class="form-control brd-rd3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Username or Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="sipassword" type="password" class="form-control brd-rd3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button type="submit" class="red-bg brd-rd3">
                                    SIGN IN
                                </button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <a class="recover-btn" href="{{ route('password.request') }}" title="" itemprop="url">Recover my password</a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="sign-popup text-center">
            <div class="sign-popup-wrapper brd-rd5">
                <div class="sign-popup-inner brd-rd5">
                    <a class="sign-close-btn" href="#" title="" itemprop="url"><i class="fa fa-close"></i></a>
                    <div class="sign-popup-title text-center">
                        <h4 itemprop="headline">SIGN UP</h4>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="sign-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="suname" type="text" class="form-control brd-rd3 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="suemail" type="email" class="form-control brd-rd3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="supassword" type="password" class="form-control brd-rd3 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <input id="password-confirm" type="password" class="form-control brd-rd3" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button class="red-bg brd-rd3" type="submit">REGISTER NOW</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="checkout" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Checkout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Total Amount: <span class="total-amount">0</span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Choose Delivery Address:</p>
                                </div>
                                <div id="checkoutAddress"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success btn-confirm-order" data-orderid>Confirm Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/fe/js/jquery.min.js"></script>
    <script src="/assets/fe/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="/assets/fe/js/plugins.js"></script>
    <script src="/assets/fe/js/main.js"></script>
    <script src="/assets/fe/js/cart.js"></script>
    @stack('scripts')
    @if(\Auth::user())
    <script>
        $.ajax({
            type: 'GET',
            url: '/getmyaddress',
            dataType: 'json',
            success:function(data){
                $('#checkoutAddress').empty();
                $.each(data, function( i, v ) {
                    $('#checkoutAddress').append('<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">'+
                        '<div class="address-holder">'+
                            '<h4><input type="radio" name="deliveryadd" checked value="'+v.caid+'"> '+v.calabel+'</h4>'+
                            '<p>'+v.castreet+' '+v.cacity+', '+v.caprovince+' '+v.cacountry+'</p>'+
                        '</div>'+
                    '</div>');
                });
            },
            error:function(data){
                console.log(data);
            }
        });
    </script>
    @endif
</body>
</html>
