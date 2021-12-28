<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="index.html"><img src="{{ asset('assets/frontend/imgs/theme/ferretools.png') }}" alt="logo"></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Categorias
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>

                            <li><a href="shop-grid-right.html"><i class="evara-font-dress"></i>Women's Clothing</a></li>

                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children">
                            <a href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="menu-item-has-children"><a href="page-about.html">Acerca de</a></li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="shop-grid-right.html">Tienda</a>
                            <ul class="dropdown">
{{--                                <li><a href="shop-filter.html">Shop – Filter</a></li>--}}
                                <li><a href="shop-wishlist.html">Lista de deseos</a></li>
                                <li><a href="shop-cart.html">Carrito de compras</a></li>
                                <li><a href="shop-checkout.html">Checkout</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a
                                href="blog-category-fullwidth.html">Blog</a>
                        </li>
                        <li class="menu-item-has-children"><a href="page-contact.html">Contáctenos</a></li>
                        {{--<li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>--}}
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="page-contact.html"> Nuestra localización </a>
                </div>
                <div class="single-mobile-header-info">
                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->utype === 'ADM')
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout
                                    <form method="POST" id="logout-form"
                                          action="{{ route('logout') }}">@csrf</form>
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout
                                    <form method="POST" id="logout-form"
                                          action="{{ route('logout') }}">@csrf</form>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endif
                </div>
                <div class="single-mobile-header-info">
                    <a href="tel:+51923456789">+51 923 456 789</a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-pinterest.svg') }}" alt=""></a>
                <a href="#"><img src="{{ asset('assets/frontend/imgs/theme/icons/icon-youtube.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div>
