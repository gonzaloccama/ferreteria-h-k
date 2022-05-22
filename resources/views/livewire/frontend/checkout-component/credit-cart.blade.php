<div class="payment_method pt-20">
    <div class="mb-25">
        <h5>Tarjeta de credito</h5>
    </div>

    <div class="card shadow p-30 mb-30">

        <span>Tarjeta de Crédito</span>
        <div class="icons">
            <img src="https://i.imgur.com/2ISgYja.png" width="30">
            <img src="https://i.imgur.com/W1vtnOV.png" width="30">
            <img src="https://i.imgur.com/35tC99g.png" width="30">
            <img src="https://i.imgur.com/2ISgYja.png" width="30">
        </div>


        <div class="payment_option">
            <?php
            $dt = [
                'name' => 'card_number',
                'text' => 'Card Number',
                'required' => 1,
                'type' => 'text',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)

            <?php
            $dt = [
                'name' => 'exp_month',
                'text' => 'Expiry Month',
                'required' => 1,
                'type' => 'text',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)

            <?php
            $dt = [
                'name' => 'exp_year',
                'text' => 'Expiry Year',
                'required' => 1,
                'type' => 'text',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)

            <?php
            $dt = [
                'name' => 'cvc',
                'text' => 'CVC',
                'required' => 1,
                'type' => 'password',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)
        </div>

    </div>
</div>
