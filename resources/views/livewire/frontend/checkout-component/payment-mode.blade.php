<div class="payment_method">
    <div class="mb-25">
        <h5>Modo de pago</h5>
    </div>
    <div class="payment_option">
        <?php
        $payments = [
            'cash' => 'Pagar con efectivo',
            'bankTranfer' => 'Transferencia bancaria directa',
//            'checkPayment' => 'Cheque de pago',
//            'paypal' => 'Paypal',
            'digitalWallet' => 'Billetera digital',
            'card' => 'Tarjeta de crédito / debito',
        ];
        $mssgs = [
            'cash' => 'Realizar pago con Dinero en efectivo',
            'bankTranfer' => 'Transferencia bancaria directa a la cuenta de la Tienda',
//            'checkPayment' => 'Envíe su cheque al nombre de la tienda, calle de la tienda, ciudad de la tienda, estado/condado de la tienda, código postal de la tienda.',
//            'paypal' => 'Pagar a través de PayPal; puede pagar con su tarjeta de crédito si no tiene una cuenta de PayPal.',
            'digitalWallet' => 'Pagar a través de Yape, Bim',
            'card' => '',
        ];
        ?>
        @foreach($payments as $key => $payment)
            <div class="custome-radio">
                <input class="form-check-input" required="" type="radio" value="{{ $key }}" wire:model="paymentMode"
                       id="{{ $key }}-pay">
                <label class="form-check-label" for="{{ $key }}-pay" data-bs-toggle="collapse"
                       data-target="#{{ $key }}" aria-controls="{{ $key }}">{{ $payment }}</label>
                <div class="form-group collapse in" id="{{ $key }}">
                    <p class="text-muted mt-5">{{ $mssgs[$key] }}</p>
                </div>
            </div>
        @endforeach

        @error('paymentMode') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
    </div>
</div>
