<div class="">
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];
    ?>
    @include('livewire.widgets.breadcrumb')

    <section class="mt-50 mb-50">

        <div class="container">

            <div class="row flex-row-reverse">

                <div class="col-lg-9">

                    @include('livewire.widgets.shop.shop-fillter')

                    <div class="row product-grid-3">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                <img class="default-img"
                                                     src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                     alt="">
                                                <img class="hover-img"
                                                     src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn hover-up"
                                               data-bs-toggle="modal"
                                               data-bs-target="#quickViewModal">
                                                <i class="fi-rs-search"></i>
                                            </a>
                                            @if($witems->contains($product->id))
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up product-wish"
                                                   wire:click.prevent="removeFromWishlist({{$product->id}})"
                                                   href="javascript:;"><i class="fi-rs-heart"></i>
                                                </a>
                                            @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up"
                                                   wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"
                                                   href="javascript:;"><i class="fi-rs-heart "></i>
                                            @endif
                                            {{--                                            <a aria-label="Compare" class="action-btn hover-up"--}}
                                            {{--                                               href="shop-compare.html"><i--}}
                                            {{--                                                    class="fi-rs-shuffle"></i></a>--}}
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <span class="hot bg-danger">En oferta</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="javascript:;">{{ $product->category->name }}</a>
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h2>
                                        <div class="rating-result" title="90%">
                                            <span>
{{--                                                <span>90%</span>--}}
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            @if($product->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now())
                                                <span>S/ {{ $product->sale_price }}</span>
                                                <span class="old-price">S/ {{ $product->regular_price }}</span>
                                            @else
                                                <span>S/ {{ $product->regular_price }}</span>
                                            @endif
                                        </div>
                                        <div class="product-action-1 show">
                                            <a aria-label="Add To Cart" class="action-btn hover-up"
                                               href="javascript:;"
                                               wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})">
                                                <i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--pagination-->

                    {{ $products->links('livewire.widgets.frontend-pagination-link') }}

                </div>

                {{--                    primary-sidebar sticky-sidebar --}}
                <div class="col-lg-3">

                    @include('livewire.widgets.shop.shop-sidebar')

                </div>
            </div>
        </div>
    </section>

</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/nouislider/nouislider.min.css') }}"/>

    <style>
        .noUi-tooltip {
            display: none;
        }

        .noUi-active .noUi-tooltip {
            display: block;
        }

        .noUi-pips .noUi-value-larg {
            margin-top: 1px;
            padding-top: 1px;
        }

    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/nouislider/nouislider.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            window.livewire.on('addCart', () => {
                notificationSwal(`¡Se agregó extosamente al <span class="fst-italic">Carrito de compras</span>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('addWishlist', () => {
                notificationSwal(`¡Se agregó extosamente <span class="fst-italic">a la Lista de deseos</span>!`, 'rgba(8,129,120,0.9)');
            });

            $('.more_categories').on('click', function () {
                ($(this).hasClass('show')) ? $(this).html('Mostrar menos...') : $(this).html('Mostrar más...');
            })
        });

        var slider = document.getElementById('slider');
        noUiSlider.create(slider, {
            start: [1, 1000],
            connect: true,
            // orientation: 'vertical',
            tooltips: true,
            range: {
                'min': 1,
                'max': 1000
            },
            pips: {
                // mode: 'steps',
                mode: 'count',
                stepped: true,
                values: 4,
                density: 4
            }
        });

        slider.noUiSlider.on('update', function (value) {
            @this.set('min_price', value[0]);
            @this.set('max_price', value[1]);
        });

    </script>
@endpush
