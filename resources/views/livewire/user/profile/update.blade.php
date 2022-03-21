<div class="card shadow">
    <div class="card-body">
        <div class="btn-toolbar nav justify-content-end"
             style="  padding: 5px 5px 2px 5px">
            <button type="button" class="btn-close align-self-end" wire:click.prevent="closeFrame"
                    aria-label="Close"></button>
        </div>
        <h4 style="position: absolute; margin-top: -20px; color: #545454; font-weight: 300">{{ __('EDITAR') }}</h4>
        <hr>

        <div class="row mt-10 mb-20">
            <div class="col-lg-4">
                @include('livewire.user.profile.avatar')
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $dt = [
                            'name' => 'name',
                            'text' => 'Nombres',
                            'required' => 1,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'email',
                            'text' => 'Correo electronico',
                            'required' => 1,
                            'type' => 'text',
                            'readonly' => true,
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'mobile',
                            'text' => 'Celular',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'line1',
                            'text' => 'Dirección 1',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'line2',
                            'text' => 'Dirección 2',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'region',
                            'text' => 'Región',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'province',
                            'text' => 'Provincia',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'city',
                            'text' => 'Ciudad',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'country',
                            'text' => 'País',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <?php
                        $dt = [
                            'name' => 'zipcode',
                            'text' => 'Código postal',
                            'required' => 0,
                            'type' => 'text',
                        ];
                        ?>
                        @include('livewire.widgets.form.shop-input', $dt)

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="button" class="btn btn-primary px-4" wire:click.prevent="updateData" value="Guardar cambios">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end p-20">
        <button class="btn btn-secondary btn-sm" wire:click.prevent="closeFrame"><i class="fas fa-arrow-left"></i>
            Regresar
        </button>
    </div>
</div>

