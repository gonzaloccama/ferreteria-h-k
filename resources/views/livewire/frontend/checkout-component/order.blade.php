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
                        <td colspan="2" class="product-subtotal"><em>S/ {{ Session::get('checkout')['tax'] }}</em></td>
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
            <input type="submit" class="btn btn-fill-out btn-block mt-30" value="Realizar pedido"
                   wire:click.prevent="placeOrder">
            @if(Session::has('stripe_error'))
                <div class="alert alert-danger alert-dismissible fade show mt-30" role="alert">
                    <button type="button" class="btn-close " data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    <strong>Mensaje:</strong> {{ Session::get('stripe_error') }}
                </div>
            @endif
        </div>
    @endif
</div>
