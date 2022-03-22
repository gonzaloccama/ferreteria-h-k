<div class="main">
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];
    ?>
    @include('livewire.widgets.breadcrumb')
    @php
        $_sale = $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now();
    @endphp

    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover shopping-summery text-center clean">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Cart::instance('cart')->count() > 0)
                                @foreach(Cart::instance('cart')->content() as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                            <img src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                                 alt="{{ $item->model->name }}">
                                        </td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name">
                                                <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                                    {{ $item->model->name }}</a>
                                            </h5>
                                            {{--                                            <p class="font-xs">{!! $item->model->short_description !!}--}}
                                            {{--                                            </p>--}}
                                        </td>
                                        <td class="price product-content-wrap" data-title="Price">
                                            <div class="product-price">
                                                @if($item->model->sale_price > 0 && $_sale)
                                                    <span>S/ {{ $item->model->sale_price }}</span>
                                                @else
                                                    <span>S/ {{ $item->model->regular_price }}</span>
                                                @endif
                                            </div>

                                        </td>
                                        <td class="text-center" data-title="Stock">

                                            <div class="detail-qty border radius  m-auto">
                                                <a href="#" class="qty-down"
                                                   wire:click.prevent="refreshQuantity('{{ $item->rowId }}', false)"><i
                                                        class="fi-rs-angle-small-down"></i>
                                                </a>
                                                <span class="qty-val">{{ $item->qty }}</span>
                                                <a href="#" class="qty-up"
                                                   wire:click.prevent="refreshQuantity('{{ $item->rowId }}')"><i
                                                        class="fi-rs-angle-small-up"></i>
                                                </a>
                                            </div>

                                        </td>
                                        <td class="text-right" data-title="Cart">
                                            <span>S/ {{ $item->subtotal }}</span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            {{--                                            <a href="#" class="text-primary"--}}
                                            {{--                                               wire:click.prevent="switchToSaveForLater('{{ $item->rowId }}')">--}}
                                            {{--                                                <i class="fi-rs-disk"></i>--}}
                                            {{--                                            </a>--}}
                                            {{--                                            <i class="fi-rs-menu-dots-vertical"></i>--}}
                                            <a href="#" class="text-muted"
                                               wire:click.prevent="destroy('{{ $item->rowId }}')">
                                                <i class="fi-rs-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-info alert-dismissible fade show pt-30" role="alert">
                                            <h3><strong>¡Ningún!</strong> artículo en el carrito.</h3>
                                            <p>agregar de la tienda</p>
                                            <button type="button" class="btn-close " data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            <a href="{{ route('shop') }}" class="btn btn-primary mt-20 mb-20">Ir a la
                                                Tienda</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td colspan="6" class="text-end">
                                    <a href="#" class="text-muted" wire:click.prevent="destroyAll()"> <i
                                            class="fi-rs-cross-small"></i> Vaciar carrito</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-action text-end">
                        {{--                        <a class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</a>--}}
                        <a class="btn " href="{{ route('shop') }}">
                            <i class="fi-rs-shopping-bag mr-10"></i>Seguir comprando</a>
                    </div>
                    <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    <div class="row mb-50">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading_s1 mb-3">
                                <h4>Calcular costo de envío</h4>
                            </div>
                            <p class="mt-15 mb-30">Tarifa plana: <span class="font-xl text-brand fw-900">5%</span></p>
                            <form class="field_form shipping_calculator">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <div class="custom_select">
                                            <?php
                                            $regions = \App\Models\Region::all();
                                            ?>
                                            <select class="form-control select-active">
                                                <option value="">Seleccione...</option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->region }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="Provincia" name="name"
                                               type="text">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input required="required" placeholder="Código postal / ZIP" name="name"
                                               type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <button class="btn  btn-sm"><i class="fi-rs-shuffle mr-10"></i>Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{--
                            <div class="mb-30 mt-50">
                                <div class="heading_s1 mb-3">
                                    <h4>Aplicar cupón</h4>
                                </div>
                                <div class="total-amount">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <div class="form-row row justify-content-center">
                                                    <div class="form-group col-lg-6">
                                                        <input class="font-medium" name="Coupon"
                                                               placeholder="Ingrese su cupón">
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Aplicar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="border p-md-4 p-30 border-radius cart-totals">
                                <div class="heading_s1 mb-3">
                                    <h4>Resumen de la orden</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart_total_label">Subtotal</td>
                                            <td class="cart_total_amount">
                                                <span
                                                    class="font-lg fw-900 text-brand">S/ {{ Cart::instance('cart')->subtotal() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">IGV</td>
                                            <td class="cart_total_amount">
                                                <span
                                                    class="font-lg fw-900 text-brand">S/ {{ Cart::instance('cart')->tax() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Envío</td>
                                            <td class="cart_total_amount"><i class="ti-gift mr-5"></i> Envío gratis
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="cart_total_label">Total</td>
                                            <td class="cart_total_amount">
                                                <strong>
                                                    <span
                                                        class="font-xl fw-900 text-brand">S/ {{ Cart::instance('cart')->total() }}</span>
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn " wire:click.prevent="checkout">
                                    <i class="fi-rs-box-alt mr-10"></i> Proceder a pagar
                                </a>

                                <a href="#" class="btn "
                                   wire:click.prevent="show_modal">
                                    <i class="fi-rs-box-alt mr-10"></i>
                                    Solicitar compra</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($showModal)
        @include('livewire.frontend.front-end-ask-modal')
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('saveForLater', () => {
                notificationSwal(`¡Se guardó exitoamente <b class="fst-italic">para mas tarde</b>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('deleteCart', () => {
                notificationSwal(`¡Se eliminó extosamente del <b class="fst-italic">Carrito de compras</b>!`, 'rgba(224,0,33,0.79)');
            });

            window.livewire.on('cleanCart', () => {
                notificationSwal(`¡Se vació todo el<b class="fst-italic">Carrito de compras</b>!`, 'rgba(224,0,33,0.79)');
            });

            window.livewire.on('sendAlert', () => {
                notificationSwal(`¡Se envió exitosamente <b class="fst-italic">su solicitud de compra</b>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('openModal', () => {
                $('#askInformation').modal('show');
            });

            window.livewire.on('closeModal', () => {
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            window.livewire.on('cleanError', () => {
                $('.error.text-danger').html('');
            });
        });
    </script>
@endpush
