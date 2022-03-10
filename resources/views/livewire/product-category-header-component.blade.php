<div>
    <?php
    $categories = \App\Models\Category::paginate($limit)->pluck('name', 'slug');
    ?>
    <ul>
        {{--
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
        --}}
        @foreach($categories as $key => $category)
            <li>
                <a href="{{ route('product.category', ['category_slug' => $key]) }}">
                    <img src="{{ asset('assets/frontend/imgs/theme/icons/icons-tools.svg') }}"
                         width="18" alt="tools" class="mr-10">{{ $category }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="more_categories {{ $limit == 5 ? '' : 'show' }}">
        <a href="javascript:;" wire:click.prevent="changeLimit">{{ $more_or_less }}...</a>
    </div>
</div>
