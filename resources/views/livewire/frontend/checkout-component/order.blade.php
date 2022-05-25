<div class="col-md-7">
    @if(Session::has('checkout'))
        <div class="order_review">
            <div class="mb-20">
                <h4>Tu orden</h4>
            </div>
            <div class="table-responsive order_table text-center">
                <table class="table">
                    <thead>
                    <tr>
                        <th colspan="2">Producto</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Cart::instance('cart')->count() > 0)
                        @foreach(Cart::instance('cart')->content() as $item)
                            <tr>
                                <td class="image product-thumbnail">
                                    <img src="{{ asset('assets/images/products/').'/'.$item->model->image }}"
                                         alt="{{ $item->model->name }}"></td>
                                <td>
                                    <h5>
                                        <a href="{{ route('product.details', ['slug' => $item->model->slug]) }}">
                                            {{ $item->model->name }}</a>
                                    </h5>
                                    <span class="product-qty">x {{ $item->qty }}</span>
                                </td>
                                <td>S/ {{ $item->subtotal }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <th>SubTotal</th>
                        <td class="product-subtotal" colspan="2">S/ {{ Session::get('checkout')['subtotal'] }}</td>
                    </tr>
                    <tr>
                        <th>Transporte</th>
                        <td colspan="2"><em>Envío gratis</em></td>
                    </tr>
                    <tr>
                        <th>IGV</th>
                        <td colspan="2" class="product-subtotal"><em>
                                {{ Session::get('checkout')['tax'] > 0 ? 'S/ ' . Session::get('checkout')['tax'] : 'Incluye'  }}
                            </em></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">
                            S/ {{ Session::get('checkout')['total'] }}
                        </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
            @include('livewire.frontend.checkout-component.payment-mode')
            @if($paymentMode == 'card')
                @include('livewire.frontend.checkout-component.credit-cart')
            @endif

            @if($paymentMode == 'digitalWallet')
                <div class="payment_method pt-20">
                    <div class="mb-25">
                        <h5>Billetera digital</h5>
                    </div>


                    <div class="card shadow p-30 mb-30">
                        <span>Yape</span>
                        <div class="icons">
                            <img src="{{ asset('assets/images/walllet/yape.png') }}" width="30">
                        </div>
<div class="text-center">
                       <img src="{{ asset('assets/images/walllet/qr.jpeg') }}" alt="" width="170">
</div>
                    </div>
                </div>
            @endif

            @if($paymentMode == 'bankTranfer')
                <div class="payment_method pt-20">
                    <div class="mb-25">
                        <h5>Transferencia bancaria</h5>
                    </div>

                    <div class="card shadow p-30 mb-30">
                        <span>BCP</span>
                        <div class="icons">
                            <img src="{{ asset('assets/images/walllet/bcp.png') }}" width="30">
                        </div>

                        <p><strong>Nro. de Cuenta:</strong> 415789635789314</p>
                    </div>
                </div>
            @endif


            <div wire:loading wire:target="placeOrder">
                <button type="button" class="btn " disabled>
                    <i class="fas fa-spinner fa-pulse fa-fw"></i>
                    <span>Procesando...</span>
                </button>
            </div>
            <div wire:loading.remove wire:target="placeOrder">
                <button type="button" class="btn " wire:click.prevent="placeOrder">
                    <i class="fi-rs-box-alt mr-10"></i> Realizar pedido
                </button>
            </div>

            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-30" role="alert">
                    <button type="button" class="btn-close " data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    <strong>Mensaje:</strong> {{ Session::get('error') }}
                </div>
            @endif
            @error('paymentMode')
            <div class="alert alert-danger alert-dismissible fade show mt-30" role="alert">
                <button type="button" class="btn-close " data-bs-dismiss="alert"
                        aria-label="Close"></button>
                <strong>Mensaje:</strong> Debe seleccionar el metodo de pago.
            </div>
            @enderror

        </div>
    @endif
</div>
