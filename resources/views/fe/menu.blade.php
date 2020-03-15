@extends('layouts.fe')

@section('content')
    <section>
        <div class="block" style="padding: 150px 0 20px;">
            <div class="fixed-bg" style="background-image: url(/assets/fe/images/parallax2.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Our Menu</h1>
                        <form class="restaurant-search-form brd-rd2">
                            @if($search_meal)
                            <input type="hidden" name="meal" value="{{ $search_meal}}">
                            @endif
                            <div class="row mrg10">
                                <div class="col-md-10 col-sm-9 col-lg-9 col-xs-12">
                                    <div class="input-field brd-rd2"><input class="brd-rd2" type="text" name="q" value="{{ $search_q }}" placeholder="Search your favourite food, drinks, etc..."></div>
                                </div>
                                <div class="col-md-2 col-sm-3 col-lg-3 col-xs-12">
                                    <button class="brd-rd2 red-bg" type="submit">SEARCH</button>
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
                <li class="breadcrumb-item"><a href="/" title="" itemprop="url">Home</a></li>
                <li class="breadcrumb-item active">Our Menus </li>
            </ol>
        </div>
    </div>

    <section>
        <div class="block less-spacing gray-bg top-padd30 pb-fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <ul class="menu-sorter">
                            <li>
                                <a href="/our-menu" class="{{ ( $search_meal === '' )? 'active' : '' }}"><span>All</span><span class="counter">{{ $cnt_lists->all }}</span></a>
                            </li>
                            <li>
                                <a href="/our-menu?meal=all-time-meal{{ ($search_q)? '&q=' . $search_q : '' }}" class="{{ ($search_meal === 'all-time-meal')? 'active' : '' }}"><span>All Time Meal</span><span class="counter">{{ $cnt_lists->all_time }}</span></a>
                            </li>
                            <li>
                                <a href="/our-menu?meal=breakfast{{ ($search_q)? '&q=' . $search_q : '' }}" class="{{ ($search_meal === 'breakfast' )? 'active' : '' }}"><span>Breakfast</span><span class="counter">{{ $cnt_lists->breakfast }}</span></a>
                            </li>
                            <li>
                                <a href="/our-menu?meal=lunch{{ ($search_q)? '&q=' . $search_q : '' }}" class="{{ ($search_meal === 'lunch' )? 'active' : '' }}"><span>Lunch</span><span class="counter">{{ $cnt_lists->lunch }}</span></a>
                            </li>
                            <li>
                                <a href="/our-menu?meal=dinner{{ ($search_q)? '&q=' . $search_q : '' }}" class="{{ ($search_meal === 'dinner' )? 'active' : '' }}"><span>Dinner</span><span class="counter">{{ $cnt_lists->dinner }}</span></a>
                            </li>
                            <li>
                                <a href="/our-menu?meal=merienda{{ ($search_q)? '&q=' . $search_q : '' }}" class="{{ ($search_meal === 'merienda' )? 'active' : '' }}"><span>Merienda</span><span class="counter">{{ $cnt_lists->merienda }}</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="sec-box">
                            <div class="remove-ext">
                                <div class="row">
                                    @foreach($lists as $list)
                                    <div class="col-md-3 col-sm-6 col-lg-3">
                                        <div class="popular-dish-box style2 wow fadeIn" data-wow-delay="0.2s">
                                            <div class="popular-dish-thumb">
                                                <a href="/menu-detail/{{ $list->menuid }}" title="" itemprop="url"><img src="/storage/images/{{ $list->mavatar }}" alt="{{ $list->menuid }}" itemprop="image"></a>
                                            </div>
                                            <div class="popular-dish-info">
                                                <h4 itemprop="headline"><a href="food-detail.html" title="" itemprop="url">{{ $list->mname }}</a></h4>
                                                <!-- <p itemprop="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
                                                <span class="price">P{{ $list->mprice }}.00</span>
                                                <a class="btn btn-sm order-now brd-rd4 " title="Order Now" itemprop="url" href="/menu-detail/{{ $list->menuid }}" >Order Now</a>
                                                <div class="restaurant-info">
                                                    <!-- <img src="/assets/fe/images/resource/restaurant-logo1.png" alt="restaurant-logo1.png" itemprop="image"> -->
                                                    <div class="restaurant-info-inner">
                                                        <h6 itemprop="headline"><a href="/vendor/" title="" itemprop="url">{{ $list->vname }}</a></h6>
                                                        <span class="red-clr">{{ $list->vstreet }} {{ $list->vcity }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-3 col-sm-6 col-lg-3 col-spacer">
                                        <div class="popular-dish-box style2">
                                            <div class="popular-dish-thumb">
                                                <a href="#" title="" itemprop="url"><img src="/assets/fe/images/resource/popular-dish-img1.jpg" itemprop="image"></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="pagination-wrapper text-center">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item prev"><a class="page-link brd-rd2" href="#" itemprop="url">PREVIOUS</a></li>
                                    <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">1</a></li>
                                    <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">2</a></li>
                                    <li class="page-item active"><span class="page-link brd-rd2">3</span></li>
                                    <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">4</a></li>
                                    <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">5</a></li>
                                    <li class="page-item">........</li>
                                    <li class="page-item"><a class="page-link brd-rd2" href="#" itemprop="url">18</a></li>
                                    <li class="page-item next"><a class="page-link brd-rd2" href="#" itemprop="url">NEXT</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/fe/js/our-menu.js') }}"></script>
@endpush