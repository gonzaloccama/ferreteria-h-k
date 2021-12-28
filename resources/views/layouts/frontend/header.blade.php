<header class="header-area header-style-1 header-height-2">

    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone"></i> <a href="tel:{{ $website->phone }}">+51 {{ $website->phone }}</a></li>
                            <li><i class="fi-rs-marker"></i><a href="page-contact.html">{{ $website->address }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop
                                        now</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2">
                    <div class="header-info header-info-right">
                        <ul>
                            {{--<li>
                                <a class="language-dropdown-active" href="#"> <i class="fi-rs-world"></i> English <i
                                        class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li><a href="#"><img src="{{ asset('assets/frontend/imgs/theme/flag-fr.png') }}"
                                                         alt="">Français</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/frontend/imgs/theme/flag-dt.png') }}"
                                                         alt="">Deutsch</a></li>
                                    <li><a href="#"><img src="{{ asset('assets/frontend/imgs/theme/flag-ru.png') }}"
                                                         alt="">Pусский</a></li>
                                </ul>
                            </li>--}}
                            @if(Route::has('login'))
                                @auth
                                    @if(Auth::user()->utype === 'ADM')
                                        <li>
                                            <a class="language-dropdown-active" href="#"> <i class="fi-rs-user"></i>
                                                {{ Auth::user()->name }}
                                                <i class="fi-rs-angle-small-down"></i>
                                            </a>
                                            <ul class="language-dropdown">
                                                <li class="row">
                                                    <a href="{{ route('admin.dashboard') }}">
                                                        <i class="fi-rs-dashboard"></i>
                                                        Dashboard
                                                    </a>
                                                </li>
                                                <li class="row">
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                                        <i class="fi-rs-sign-in"></i>
                                                        Logout
                                                        <form method="POST" id="logout-form"
                                                              action="{{ route('logout') }}">@csrf</form>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a class="language-dropdown-active w-75" href="#"> <i
                                                    class="fi-rs-user"></i>
                                                {{ Auth::user()->name }}
                                                <i class="fi-rs-angle-small-down"></i>
                                            </a>
                                            <ul class="language-dropdown">
                                                <li>
                                                    <a href="{{ route('user.dashboard') }}">
                                                        <i class="fi-rs-dashboard"></i>
                                                        Dashboard
                                                    </a>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                                        <i class="fi-rs-sign-in"></i>
                                                        Logout
                                                        <form method="POST" id="logout-form"
                                                              action="{{ route('logout') }}">@csrf</form>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="language-dropdown-active" href="#"> <i class="fi-rs-user"></i> Usuario
                                            <i
                                                class="fi-rs-angle-small-down"></i></a>
                                        <ul class="language-dropdown">
                                            <li>
                                                <a href="{{ route('login') }}">
                                                    <i class="fi-rs-sign-out"></i>
                                                    Login
                                                </a>
                                                <a href="{{ route('register') }}">
                                                    <i class="fi-rs-user-add"></i>
                                                    Registar
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="index.html"><img src="{{ asset('assets/frontend/imgs/theme/ferretools.png') }}" alt="logo"></a>
                </div>
                <div class="header-right">

                    @livewire('header-search-component')

                    <div class="header-action-right">
                        <div class="header-action-2">

                            @livewire('wishlist-count-component')

                            @livewire('cart-count-component')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html">
                        <img src="{{ asset('assets/frontend/imgs/theme/ferretools.png') }}" alt="logo">
                    </a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active" href="#">
                            <span class="fi-rs-apps"></span> Categorias
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            <ul>
                                <li class="has-children">
                                    <a href="shop-grid-right.html"><i class="evara-font-dress"></i>Women's Clothing</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li>
                                                                <span class="submenu-title">Hot & Trending</span>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item nav-link nav_item" href="#">Dresses</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            <li>
                                                                <span class="submenu-title">Bottoms</span></li>
                                                            <li>
                                                                <a class="dropdown-item nav-link nav_item" href="#">Leggings</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img
                                                        src="{{ asset('assets/frontend/imgs/banner/menu-banner-2.jpg') }}"
                                                        alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Computer &
                                        Office</a>
                                </li>

                                <li>
                                    <ul class="more_slide_open" style="display: none;">
                                        <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Beauty,
                                                Health</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="more_categories">Show more...</div>
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>
                                <li>
                                    <a class="{{ route('home') === url()->current()? 'active':'' }}"
                                       href="{{ route('home') }}">Inicio</a>
                                </li>

                                <li>
                                    <a href="#">Acerca de</a>
                                </li>

                                <li><a href="{{ route('shop') }}">Tienda<i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('product.cart') }}">Lista de deseoas</a></li>
                                        <li><a href="{{ route('product.wishlist') }}">Carrito de compras</a></li>
                                        <li><a href="shop-checkout.html">Checkout</a></li>
                                        <li><a href="shop-compare.html">Comparar</a></li>
                                    </ul>
                                </li>

                                <li><a href="blog-category-grid.html">Blog</a></li>

                                <li>
                                    <a href="page-contact.html">Contáctenos</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-headset"></i><span></span> +51 987 654 321 </p>
                </div>
                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%
                </p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Evara"
                                     src="{{ asset('assets/frontend/imgs/theme/icons/icon-heart.svg') }}">
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="Evara"
                                     src="{{ asset('assets/frontend/imgs/theme/icons/icon-cart.svg') }}">
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>

                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html">
                                                <img alt="Evara"
                                                     src="{{ asset('assets/frontend/imgs/shop/thumbnail-3.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>

                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
