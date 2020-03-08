@extends('layouts.fe')

@section('content')

    <section>
        <div class="block" style="padding: 150px 0 20px;">
            <div class="fixed-bg" style="background-image: url(/assets/fe/images/parallax2.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Food Details</h1>
                            <span>Recipes, ingredients, add-ons, etc... </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bread-crumbs-wrapper">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item"><a href="/our-menu" title="" itemprop="url">Our Menu </a></li>
                <li class="breadcrumb-item active">Food / Menu Details</li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block gray-bg bottom-padd210 top-padd30 pb-fixed">            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-box">
							<div class="sec-wrapper">

								<div class="col-md-8 col-sm-12 col-lg-8">
									<div class="restaurant-detail-wrapper">
										<div class="restaurant-detail-info">
											<div class="restaurant-detail-thumb">
												<ul class="restaurant-detail-img-carousel">
													<li><img class="brd-rd3" src="/assets/fe/images/resource/restaurant-detail-big-img1-1.jpg" alt="restaurant-detail-big-img1-1.jpg" itemprop="image"></li>
												</ul>
											</div>

											<div class="restaurant-detail-title">
												<form id="form-menu-details-order-now">													
													<input type="hidden" name="ordermenuid" value="{{ $menu->menuid }}">
	                                                @guest
	                                                @else
													<input type="hidden" name="ordercustomerid" value="{{ Auth::user()->id }}">
													@endguest
													<h1 itemprop="headline">{{ $menu->mname }}</h1>
													<div class="info-meta">
														<span>{{ $menu->vname }}</span>
														<span><a href="#" title="" itemprop="url">{{ $menu->vstreet }} {{ $menu->vcity }} </a></span>
													</div>
													<span class="price">P{{ $menu->mprice }}.00</span>
													<div class="qty-wrap">
														<input class="qty" type="number" name="orderquantity" value="1">
													</div>
													<p itemprop="description">{{ $menu->mdesc }}</p>

	                                                <h3>Add-ons</h3>
	                                                <div class="add-ons">
	                                                	@foreach($addons as $addon)
		                                                    <div class="qty-wrap">
		                                                        <span class="price">{{ $addon->addname }} - P{{ $addon->addprice }}.00</span>
		                                                        <input class="qty" name="orderaddons[{{ $addon->addid }}]" type="number" value="0">
		                                                    </div>
	                                                	@endforeach
	                                                </div>
	                                                @auth                             
	                                                	<button class="brd-rd3 btn btn-sm btn-order-now-menu-details order-now-menu-details" title="" itemprop="url">Order Now</button>
	                                                @else	             
	                                                	<button class="brd-rd3 btn btn-sm btn-order-now-menu-details log-popup-btn" title="" itemprop="url">Login to add to cart</button>
													@endauth
												</form>
											</div>

                                            <!-- <h4 itemprop="headline">REVIEWS</h4>
                                            <div class="review-list">
                                                <div class="review-box brd-rd5">
                                                    <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                    <div class="review-info">
                                                        <img class="brd-rd50" src="/assets/fe/images/resource/reviewr-img1.jpg" alt="reviewr-img1.jpg" itemprop="image">
                                                        <div class="review-info-inner">
                                                            <h5 itemprop="headline">QLARK JAKSON</h5>
                                                            <i class="red-clr">2 months Ago</i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-box brd-rd5">
                                                    <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                    <div class="review-info">
                                                        <img class="brd-rd50" src="/assets/fe/images/resource/reviewr-img2.jpg" alt="reviewr-img2.jpg" itemprop="image">
                                                        <div class="review-info-inner">
                                                            <h5 itemprop="headline">QLARK JAKSON</h5>
                                                            <i class="red-clr">2 months Ago</i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-box brd-rd5">
                                                    <p itemprop="description">FoodBakery order today. So great to be able to order food and not have to talk to anyone.</p>
                                                    <div class="review-info">
                                                        <img class="brd-rd50" src="/assets/fe/images/resource/reviewr-img3.jpg" alt="reviewr-img3.jpg" itemprop="image">
                                                        <div class="review-info-inner">
                                                            <h5 itemprop="headline">QLARK JAKSON</h5>
                                                            <i class="red-clr">2 months Ago</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
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