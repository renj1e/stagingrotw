@extends('layouts.fe')

@section('content')
    <section>
        <div class="block landing-block">
            <div style="background-image: url(assets/fe/images/topbg2.jpeg);" class="fixed-bg"></div>
            <div class="restaurant-searching text-center">
                <div class="restaurant-searching-inner">
                    <h2 itemprop="headline" class=" hidden-sm hidden-xs">Search your favourite food</h2>
                    <form class="restaurant-search-form brd-rd2" action="/our-menu" method="get">
                        <div class="row mrg10">
                            <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="q" placeholder="Search your favourite food, drinks, etc..."></div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                    <div class="meals">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <div class="top-restaurants-wrapper">
                                        <ul class="restaurants-wrapper style2">
                                            <li class="wow bounceIn" data-wow-delay="0.2s">
                                                <div class="top-restaurant">
                                                    <a class="brd-rd50" href="our-menu?meal=all-time-meal" title="All Time Meal" itemprop="url">
                                                        <img src="/assets/fe/images/meals/all-time.png" itemprop="image">
                                                        <span>All Time Meal</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="wow bounceIn" data-wow-delay="0.4s">
                                                <div class="top-restaurant">
                                                    <a class="brd-rd50" href="our-menu?meal=breakfast" title="Breakfast" itemprop="url">
                                                        <img src="/assets/fe/images/meals/breakfast.png" itemprop="image">
                                                        <span>Breakfast</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="wow bounceIn" data-wow-delay="0.6s">
                                                <div class="top-restaurant">
                                                    <a class="brd-rd50" href="our-menu?meal=lunch" title="Lunch" itemprop="url">
                                                        <img src="/assets/fe/images/meals/lunch.png" itemprop="image">
                                                        <span>Lunch</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="wow bounceIn" data-wow-delay="0.8s">
                                                <div class="top-restaurant">
                                                    <a class="brd-rd50" href="our-menu?meal=dinner" title="Dinner" itemprop="url">
                                                        <img src="/assets/fe/images/meals/dinner.png" itemprop="image">
                                                        <span>Dinner</span>
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="wow bounceIn" data-wow-delay="1s">
                                                <div class="top-restaurant">
                                                    <a class="brd-rd50" href="our-menu?meal=merienda" title="Merienda" itemprop="url">
                                                        <img src="/assets/fe/images/meals/merienda.png" itemprop="image">
                                                        <span>Merienda</span>
                                                    </a>
                                                </div>
                                            </li>                                            
                                        </ul>
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
