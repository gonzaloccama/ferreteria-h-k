<main class="main">
{{--    @push('title'){{ $titlePage }}@endpush--}}
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];
    ?>
    @include('livewire.widgets.breadcrumb')
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover shopping-summery text-center">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado del STOCK</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Cart::instance('wishlist')->content()->count() > 0)
                                @foreach(Cart::instance('wishlist')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                                 alt="#">
                                        </td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name">
                                                <a href="{{ route('product.details', ['slug'=>$item->model->slug]) }}">{{ $item->model->name }}</a>
                                            </h5>
                                            {{--                                    <p class="font-xs">Maboriosam in a tonto nesciung eget<br> distingy magndapibus.--}}
                                            {{--                                    </p>--}}
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>S/ {{ $item->model->regular_price }}</span></td>
                                        <td class="text-center" data-title="Stock">
                                            <span class="color3 font-weight-bold
                                                {{ $item->model->stock_status=='outofstock'?'text-danger':'' }}">
                                                {{ $item->model->stock_status }}
                                            </span>
                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            @if($item->model->stock_status!=='outofstock')
                                                <button class="btn btn-sm"
                                                        wire:click.prevent="moveProductFromWishlistToCart('{{$item->rowId}}')">
                                                    <i class="fi-rs-shopping-bag mr-5"></i>Mover al Carrito
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-secondary">
                                                    <i class="fi-rs-headset mr-5"></i>Contáctenos
                                                </button>
                                            @endif
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})">
                                                <i class="fi-rs-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>¡Sin artículos!</strong> en la lista de deseos.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@push('styles')

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

        .product-wish {
            position: absolute;
            top: 10%;
            left: 0;
            z-index: 99;
            right: 30px;
            text-align: right;
            padding-top: 0;
        }

        .product-wish .fa {
            color: #cbcbcb;
            font-size: 32px;
        }

        .product-wish .fa:hover {
            color: #ff7007;
        }

        .fill-heart {
            color: #ff7007 !important;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('moveToCart', () => {
                notificationSwal(`¡Se movió extosamente al <b class="fst-italic">Carrito de compras</b>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('deleteWishlist', () => {
                notificationSwal(`¡Se eliminó extosamente <b class="fst-italic">de la Lista de deseos</b>!`, 'rgba(224,0,33,0.79)');
            });
        });
    </script>
@endpush
