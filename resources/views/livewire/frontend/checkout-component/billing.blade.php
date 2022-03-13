<div class="col-md-5">
    <?php
    $regions = \App\Models\Region::all();
    ?>
    <div class="order_review">
        <div class="mb-25">
            <h4>Detalles del orden</h4>
        </div>

        <?php
        $dt = [
            'name' => 'firstname',
            'text' => 'Nombres',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'lastname',
            'text' => 'Apellidos',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'mobile',
            'text' => 'Telefono',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'email',
            'text' => 'Correo electrónico',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'region',
            'text' => 'Departamento',
            'required' => 1,
            'type' => 'obj',
            'options' => $regions,
        ];
        ?>
        @include('livewire.widgets.form.shop-select', $dt)

        @if(isset($region) && !empty($region))
            <?php
            $provinces = \App\Models\Region::find($region)->province;
            $dt = [
                'name' => 'province',
                'text' => 'Provincia',
                'required' => 1,
                'type' => 'list',
                'options' => json_decode($provinces),
            ];
            ?>
            @include('livewire.widgets.form.shop-select', $dt)
        @endif

        <?php
        $dt = [
            'name' => 'city',
            'text' => 'Ciudad',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'line1',
            'text' => 'Línea de dirección 1',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'line2',
            'text' => 'Línea de dirección 2',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <?php
        $dt = [
            'name' => 'zipcode',
            'text' => 'Código postal',
            'required' => 1,
            'type' => 'text',
        ];
        ?>
        @include('livewire.widgets.form.shop-input', $dt)

        <div class="form-group">
            <div class="checkbox">
                <div class="custome-checkbox">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="createaccount">
                    <label class="form-check-label label_info" data-bs-toggle="collapse"
                           href="#collapsePassword" data-target="#collapsePassword"
                           aria-controls="collapsePassword"
                           for="createaccount"><span>¿Crea una cuenta?</span></label>
                </div>
            </div>
        </div>
        <div id="collapsePassword" class="form-group create-account collapse in">

            <?php
            $dt = [
                'name' => 'password',
                'text' => 'Password',
                'required' => 1,
                'type' => 'password',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)
        </div>
        <div class="ship_detail">
            <div class="form-group">
                <div class="chek-form">
                    <div class="custome-checkbox">
                        <input class="form-check-input" type="checkbox" name="checkbox"
                               id="differentaddress" wire:model="is_shipping_different">
                        <label class="form-check-label label_info {{ $is_shipping_different ? 'collapsed' : '' }}"
                               href="#collapseAddress"
                               for="differentaddress"><span>¿Envia a una direccion diferente?</span></label>
                    </div>
                </div>
            </div>
            <div id="collapseAddress" class="different_address in collapse {{ $is_shipping_different ? 'show' : '' }}">
                <?php
                $dt = [
                    'name' => 's_firstname',
                    'text' => 'Nombres',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_lastname',
                    'text' => 'Apellidos',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_mobile',
                    'text' => 'Telefono',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_email',
                    'text' => 'Correo electrónico',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_region',
                    'text' => 'Departamento',
                    'required' => 1,
                    'type' => 'obj',
                    'options' => $regions,
                ];
                ?>
                @include('livewire.widgets.form.shop-select', $dt)

                @if(isset($s_region) && !empty($s_region))
                    <?php
                    $provinces = \App\Models\Region::find($s_region)->province;
                    $dt = [
                        'name' => 's_province',
                        'text' => 'Provincia',
                        'required' => 1,
                        'type' => 'list',
                        'options' => json_decode($provinces),
                    ];
                    ?>
                    @include('livewire.widgets.form.shop-select', $dt)
                @endif


                <?php
                $dt = [
                    'name' => 's_city',
                    'text' => 'Ciudad',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_line1',
                    'text' => 'Línea de dirección 1',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_line2',
                    'text' => 'Línea de dirección 2',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

                <?php
                $dt = [
                    'name' => 's_zipcode',
                    'text' => 'Código postal',
                    'required' => 1,
                    'type' => 'text',
                ];
                ?>
                @include('livewire.widgets.form.shop-input', $dt)

            </div>
        </div>
        {{--        <div class="mb-20">--}}
        {{--            <h5>Additional information</h5>--}}
        {{--        </div>--}}
        {{--        <div class="form-group mb-30">--}}
        {{--            <textarea rows="5" placeholder="Order notes"></textarea>--}}
        {{--        </div>--}}

    </div>
</div>
