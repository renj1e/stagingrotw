@extends('layouts.fe')

@section('content')
    <section>
        <div class="block" style="padding: 150px 0 20px;">
            <div class="fixed-bg" style="background-image: url(/assets/fe/images/parallax2.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Track your order</h1>
                        <form class="restaurant-search-form brd-rd2">
                            <div class="row mrg10">
                                <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                    <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="trackid" placeholder="Type your tracking number here ex. 1234567890"></div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                    <button class="brd-rd2 red-bg" type="submit">TRACK MY ORDER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Track your order</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30 pb-fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="dashboard-wrapper brd-rd5">
                                @auth
                                    <div class="welcome-note yellow-bg brd-rd5">
                                        <h4 itemprop="headline">Hi, {{ Auth::user()->name }}</h4>
                                        <p itemprop="description">You will receive your order within <span>30min</span> at your <span>Home Address</span>. Please pay the exact amount of <span>P200</span>.</p>
                                        <p itemprop="description">Thank you for being a regular customer. Enjoy your food.</p>
                                        <img src="/assets/fe/images/resource/welcome-note-img.png" alt="welcome-note-img.png" itemprop="image">
                                    </div>
                                @endauth

                                <div class="order-list">
                                    <div class="order-item brd-rd5">
                                        <div class="order-thumb brd-rd5">
                                            <a href="#" title="" itemprop="url"><img src="/assets/fe/images/resource/order-img1.jpg" alt="order-img1.jpg" itemprop="image"></a>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 4.25</span>
                                        </div>
                                        <div class="order-info">
                                            <span class="red-clr">Maenaam Thai Restaurant</span>
                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">Large Lomi x 2</a></h4>
                                            
                                            <span class="price">P85.00</span>
                                            <a class="brd-rd2" href="#" title="" itemprop="url">Order Details</a>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i>Add-ons: Cheese, Hot sauce, etc...</li>
                                                <li><i class="flaticon-transport"></i> 10min</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="order-item brd-rd5">
                                        <div class="order-thumb brd-rd5">
                                            <a href="#" title="" itemprop="url"><img src="/assets/fe/images/resource/order-img2.jpg" alt="order-img2.jpg" itemprop="image"></a>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 3.0</span>
                                        </div>
                                        <div class="order-info">
                                            <span class="red-clr">Maenaam Thai Restaurant</span>
                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">Large Siopao x 3</a></h4>
                                            
                                            <span class="price">P85.00</span>
                                            <a class="brd-rd2" href="#" title="" itemprop="url">Order Details</a>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i>Add-ons: Cheese, Hot sauce, etc...</li>
                                                <li><i class="flaticon-transport"></i> 10min</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="order-item brd-rd5">
                                        <div class="order-thumb brd-rd5">
                                            <a href="#" title="" itemprop="url"><img src="/assets/fe/images/resource/order-img3.jpg" alt="order-img3.jpg" itemprop="image"></a>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 5.00</span>
                                        </div>
                                        <div class="order-info">
                                            <span class="red-clr">Maenaam Thai Restaurant</span>
                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">Pancit Bilao x 1</a></h4>
                                            
                                            <span class="price">P85.00</span>
                                            <a class="brd-rd2" href="#" title="" itemprop="url">Order Details</a>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i>Add-ons: Cheese, Hot sauce, etc...</li>
                                                <li><i class="flaticon-transport"></i> 10min</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="order-item brd-rd5">
                                        <div class="order-thumb brd-rd5">
                                            <a href="#" title="" itemprop="url"><img src="/assets/fe/images/resource/order-img4.jpg" alt="order-img4.jpg" itemprop="image"></a>
                                            <span class="post-rate yellow-bg brd-rd2"><i class="fa fa-star-o"></i> 5.30</span>
                                        </div>
                                        <div class="order-info">
                                            <span class="red-clr">Maenaam Thai Restaurant</span>
                                            <h4 itemprop="headline"><a href="#" title="" itemprop="url">1L Coke x 4</a></h4>
                                            
                                            <span class="price">P85.00</span>
                                            <a class="brd-rd2" href="#" title="" itemprop="url">Order Details</a>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-check-circle-o"></i>Add-ons: Cheese, Hot sauce, etc...</li>
                                                <li><i class="flaticon-transport"></i> 10min</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection