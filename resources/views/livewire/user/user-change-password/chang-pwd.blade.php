<div class="card shadow">
    <div class="card-body">
        <form action="" class="container mt-50 pb-0 mb-0">
            <?php
            $dt = [
                'name' => 'current_password',
                'text' => 'Contraseña actual',
                'required' => 1,
                'type' => 'password',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)

            <?php
            $dt = [
                'name' => 'password',
                'text' => 'Nueva contraseña',
                'required' => 1,
                'type' => 'password',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)

            <?php
            $dt = [
                'name' => 'confirm_password',
                'text' => 'Confirmar contraseña',
                'required' => 1,
                'type' => 'password',
            ];
            ?>
            @include('livewire.widgets.form.shop-input', $dt)
        </form>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end p-20">
        <button class="btn btn-secondary btn-sm" wire:click.prevent="changPwd">
            Guardar
        </button>
    </div>
</div>


