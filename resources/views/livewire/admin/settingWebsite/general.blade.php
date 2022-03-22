<div class="mb-5">
    <h3 class="card-title">Información General</h3>
    <form>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label">NOMBRE</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="name" placeholder="Nombre" wire:model="name">
                @error('name') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="down_name" class="col-sm-3 col-form-label">SLOGAN</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="down_name" placeholder="Nombre Adicional"
                       wire:model="down_name">
                @error('down_name') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Emails</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="email" placeholder="Email" wire:model="email">
                @error('email') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Telefonos</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="phone" placeholder="Teléfono" wire:model="phone">
                @error('phone') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Dirección</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="address" placeholder="Dirección" wire:model="address">
                @error('address') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="attention" class="col-sm-3 col-form-label">Horarios de atención</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="attention" placeholder="Horarios de atención"
                       wire:model="attention">
                @error('attention') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="postal_code" class="col-sm-3 col-form-label">Código postal</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="postal_code" placeholder="Código postal"
                       wire:model="postal_code">
                @error('postal_code') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="logo_dark" class="col-sm-3 col-form-label">Logo</label>

            <div class="col-sm-9">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="form-control" id="logo_dark" placeholder="Logo"
                               wire:model="newLogo_dark">
                        <label class="custom-file-label text-lowercase"
                               for="logo_dark">{{ isset($logo_dark) && !empty($logo_dark)?$logo_dark:'Elija un archivo' }}</label>

                    </div>
                </div>
                <div wire:loading wire:target="newLogo_dark">Cargando...</div>
                @error('newLogo_dark') <span
                    class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                @if($newLogo_dark)
                    <img src="{{ $newLogo_dark->temporaryUrl() }}"
                         class="img-fluid border-radius mt-2 border-0 shadow-sm"
                         alt="" width="220">
                @else
                    <img src="{{ asset('assets/images/logo').'/'.$logo_dark }}"
                         class="img-fluid border-radius mt-2 border-0 shadow-sm" alt="" width="220">
                @endif
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="generalInformation">Guardar
                </button>
            </div>
        </div>
    </form>
</div>
