@extends('layouts.fe')

@section('content')
    <section>
        <div class="block" style="padding: 150px 0 20px;">
            <div class="fixed-bg" style="background-image: url(/assets/fe/images/parallax2.jpg);"></div>
            <div class="page-title-wrapper text-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="page-title-inner">
                        <h1 itemprop="headline">Track your order</h1>
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
                                        <p itemprop="description">Please pay the exact amount of <span class="amount-to-pay">P0.00</span>.</p>
                                        <p itemprop="description">Thank you for being a regular customer. Enjoy your food.</p>
                                        <img src="/assets/fe/images/resource/welcome-note-img.png" alt="welcome-note-img.png" itemprop="image">
                                    </div>
                                @endauth

                                <div class="order-list">
                                    @foreach($trackorders as $o)
                                        <div class="welcome-note yellow-bg brd-rd5" data-order-price="{{$o->order_trackdelivery_fee}}">
                                        <p itemprop="description">Order Status: 
                                            @switch($o->order_trackstatus)
                                                @case('order_confirmed_and_received')
                                                    <span class="">Confirmed Order </span>
                                                @break
                                                @case('processing')
                                                    <span class="">Processing </span>
                                                @break
                                                @case('purchased')
                                                    <span class="">Purchased </span>
                                                @break
                                                @case('otw')
                                                    <span class="">On the way </span>
                                                @break
                                                @case('delivered')
                                                    <span class="">delivered </span>
                                                @break

                                                @default
                                                @break
                                            @endswitch
                                        </p>
                                        </div>
                                        @foreach($o->orders as $order)
                                        <div class="order-item brd-rd5" data-order-price="{{ ($order->mprice * $order->orderquantity) }}">
                                            <div class="order-thumb brd-rd5">
                                                <a href="/menu-detail/{{ $order->menuid }}"title="" itemprop="url"><img src="/storage/images/{{ $order->mavatar }}" alt="order-img1.jpg" itemprop="image"></a>
                                            </div>
                                            <div class="order-info">
                                                <span class="red-clr">
                                                    {{ $order->vname }}
                                                </span>
                                                <h4 itemprop="headline"><a href="/menu-detail/{{ $order->menuid }}" title="" itemprop="url">{{ $order->mname }} x {{ $order->orderquantity }}</a></h4>
                                                
                                                <span class="price">P{{ ($order->mprice * $order->orderquantity) }}.00</span>
                                                <!-- <a class="brd-rd2" href="/menu-detail/{{ $order->menuid }}" title="" itemprop="url">Order Details</a> 
                                                <ul class="post-meta">
                                                    <li><i class="fa fa-check-circle-o"></i>Add-ons:
                                                        @if(count($order->addons) > 0)
                                                        @foreach($order->addons as $li)
                                                        <span data-order-price="{{ $li->addprice * $li->q }}">{{ $li->addname }} (P{{ $li->addprice }}.00) x {{ $li->q }}</span>,
                                                        @endforeach
                                                        @else
                                                            <span>No Orders yet to track!</span>
                                                        @endif
                                                    </li>
                                                    <!- <li><i class="flaticon-transport"></i> 00min</li> ->
                                                </ul>-->
                                            </div>
                                        </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        var data = $('[data-order-price]');
        total = 0;
        $.each(data, function( i, v ) {
            total += $(v).data('order-price');
        });
        console.log(total)
        $('.amount-to-pay').empty().append('P'+total+'.00')
    });
</script>
@endpush