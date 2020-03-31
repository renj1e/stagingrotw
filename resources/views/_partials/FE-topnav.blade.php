

<header class="stick">
    <div class="topbar">
        <div class="container">
            <div class="topbar-register">
                @guest
                    <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a> 
                @else
                    <a href="/dashboard" title="My Account" itemprop="url">MY ACCOUNT</a> / 
                    <a href="{{ route('logout') }}" title="Logout" itemprop="url"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
            <div class="social1">
                <button title="Cart" class="btn btn-xs btn-cart-drawer"><i class="fa fa-shopping-cart"></i> <span class="cart cart_count">0</span></button>
            </div>
        </div>                
    </div>
    <div class="logo-menu-sec">
        <div class="container">
            <nav>
                <div class="menu-sec">
                    <ul>
                        <li><a href="/" title="HOME" itemprop="url"><span class="red-clr">ON THE WAY</span>HOME</a></li>
                        <li><a href="/our-menu" title="OUR MENU" itemprop="url"><span class="red-clr">REAL FOOD</span>OUR MENU</a></li>
                        <!-- <li><a href="/contact" title="CONTACT US" itemprop="url"><span class="red-clr">NEED SOME HELP?</span>CONTACT US</a></li> -->
                    </ul>
                    
                @guest
                @else
                    <a class="red-bg brd-rd4" href="/track-order" title="Register" itemprop="url">TRACK ORDER</a>
                @endguest
                </div>
            </nav>
        </div>
    </div>
    <div class="sticky-cart btn-cart-drawer">
        <p>Cart <i class="fa fa-shopping-cart"></i> <span class="cart cart_count">0</span></p>
    </div>
</header>

<div class="responsive-header">
    <div class="responsive-logomenu">
        <span class="menu-btn yellow-bg brd-rd4"><i class="fa fa-align-justify"></i></span>
        <div class="social1 responsive">
            <button title="Cart" class="btn btn-xs btn-cart-drawer"><i class="fa fa-shopping-cart"></i> <span class="cart cart_count">0</span></button>
        </div>
    </div>
    <div class="responsive-menu">
        <span class="menu-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
        <div class="menu-lst">
            <ul>
                <li><a href="/" title="HOME" itemprop="url"><span class="yellow-clr">ON THE WAY</span>HOME</a></li>
                <li><a href="/our-menu" title="OUR MENU" itemprop="url"><span class="yellow-clr">REAL FOOD</span>OUR MENU</a></li>
                <!-- <li><a href="/contact" title="CONTACT US" itemprop="url"><span class="yellow-clr">NEED SOME HELP?</span>CONTACT US</a></li> -->
            </ul>
        </div>
        <div class="topbar-register">
            @guest
                <a class="log-popup-btn" href="#" title="Login" itemprop="url">LOGIN</a> / <a class="sign-popup-btn" href="#" title="Register" itemprop="url">REGISTER</a> 
            @else
                <a href="/dashboard" title="My Account" itemprop="url">MY ACCOUNT</a> / 
                <a href="{{ route('logout') }}" title="Logout" itemprop="url"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    LOGOUT
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
        <div class="register-btn">
            <a class="yellow-bg brd-rd4" href="register-reservation.html" title="Track Order" itemprop="url">TRACK ORDER</a>
        </div>
    </div>
</div>

<div class="cart-drawer">
    <span class="btn-cart-close red-bg brd-rd3"><i class="fa fa-close"></i></span>
    <div class="cart-body" id="cartContent">
    </div>
    <div class="cart-footer">
        <div class="row" id="cartFooter" data-delivery-fee="100">
        </div>
    </div>
</div>

