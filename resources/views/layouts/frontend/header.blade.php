<header class="header-area header-style-1 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone"></i> <a
                                    href="tel:{{ $website->phone }}">+51 {{ $website->phone }}</a></li>
                            <li><i class="fi-rs-marker"></i><a href="javascript:;">{{ $website->address }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="text-center">
                        <?php
                        $socials = json_decode($website->media_social);
                        ?>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            @foreach($socials as $key => $social)
                                @if(isset($social) && !empty($social))
                                    @if($key != 'whatsapp')
                                        <a href="{{ $social }}">
                                            <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons').'/icons-' . $key . '.svg' }}"
                                                alt="{{ $key }}">
                                        </a>
                                    @else
                                        <a href="https://api.whatsapp.com/send?phone={{ $social }}">
                                            <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons').'/icons-' . $key . '.svg' }}"
                                                alt="{{ $key }}">
                                        </a>
                                    @endif
                                @endif
                            @endforeach

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
                                                        Cerrar sesión
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
                                                        Cerrar sesión
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
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo/logo.png') }}"
                             alt="logo">
                    </a>
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

    <div class="header-bottom header-bottom-bg-color sticky-bar" style="background-color: var(--st-patricks-blue-94)">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="logo">
                    </a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categori-button-active text-white" href="#">
                            <span class="fi-rs-apps text-white"></span> Categorias
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large">
                            @livewire('product-category-header-component')
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <?php
                        $menus = \App\Models\SettingMenu::orderBy('order')->with('children', function ($query) {
                            $query->orderBy('order');
                        })->where('type', 'page')->where('parent', 0)->get();
                        ?>
                        <nav>
                            <ul>
                                @foreach($menus as $menu)
                                    <li class="menu-ecommerce">
                                        <a href="{{ $menu->is_route == '1' ? route($menu->route) : 'javascript:;' }}"
                                           class="{{ $menu->is_route == '1' ? route($menu->route) === url()->current()? 'active':'' : '' }}">
                                            {{ $menu->name }}
                                            @if(count($menu->children))
                                                <i class="fi-rs-angle-down"></i>
                                            @endif
                                        </a>
                                        @if(count($menu->children))
                                            <ul class="sub-menu"
                                                style="background-color: var(--st-patricks-blue-94); border-radius: 0">
                                                @foreach($menu->children as $smenu)
                                                    <li>
                                                        <a class="text-white"
                                                           href="{{ route($smenu->route) }}">{{ $smenu->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="hotline d-none d-lg-block">
                    <p><i class="fi-rs-headset text-white"></i><span></span>
                        <a href="tel:{{ $website->phone }}" class="text-white">+51 {{ $website->phone }}</a></p>
                </div>

                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        @livewire('wishlist-count-component')

                        @livewire('cart-count-responsive-component')

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
