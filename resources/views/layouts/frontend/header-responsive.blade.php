<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo"
                         style="width: 300px !important;">
                </a>
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
                    <input type="text" placeholder="Buscar…">
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
                    <?php
                    $menus = \App\Models\SettingMenu::orderBy('order')->with('children', function ($query) {
                        $query->orderBy('order');
                    })->where('type', 'page')->where('parent', 0)->get();
                    ?>
                    <ul class="mobile-menu">
                        @foreach($menus as $menu)
                            <li class="menu-item-has-children">
                                @if(count($menu->children))
                                    <span class="menu-expand"></span>
                                @endif
                                <a href="{{ $menu->is_route == '1' ? route($menu->route) : 'javascript:;' }}">
                                    {{ $menu->name }}
                                </a>
                                @if(count($menu->children))
                                    <ul class="dropdown">
                                        @foreach($menu->children as $smenu)
                                            <li>
                                                <a href="{{ route($smenu->route) }}">{{ $smenu->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
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
                    <a href="tel:{{ $website->phone }}">+51 {{ $website->phone }}</a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Síguenos</h5>
                <?php
                $socials = json_decode($website->media_social);
                ?>
                @foreach($socials as $key => $social)
                    @if(isset($social) && !empty($social))
                        @if($key != 'whatsapp')
                            <a href="{{ $social }}">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icons-' . $key . '.svg') }}"
                                     alt="{{ $key }}">
                            </a>
                        @else
                            <a href="https://api.whatsapp.com/send?phone={{ $social }}">
                                <img src="{{ asset('assets/frontend/imgs/theme/icons/icons-' . $key . '.svg') }}"
                                     alt="{{ $key }}">
                            </a>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
