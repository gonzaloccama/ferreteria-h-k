<div class="mb-5">
    <h3 class="card-title">Logo secundario</h3>
    <form>

        <div class="form-group row">
            <label for="abstract" class="col-sm-3 col-form-label">RESUMEN</label>
            <div class="col-sm-9">
                <textarea placeholder="Resumen" id="abstract" wire:model="abstract"
                          class="form-control abstract" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="logo_white" class="col-sm-3 col-form-label">Logo secundario</label>

            <div class="col-sm-9">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="form-control" id="logo_white" placeholder="Logo"
                               wire:model="newLogo_white">
                        <label class="custom-file-label text-lowercase"
                               for="logo_white">{{ isset($logo_white) && !empty($logo_white)?$logo_white:'Elija un archivo' }}</label>
                    </div>
                </div>
                @if($newLogo_white)
                    <img src="{{ $newLogo_white->temporaryUrl() }}"
                         class="img-fluid border-radius mt-2 border-0 shadow-sm"
                         alt="" width="220">
                @else
                    <img src="{{ asset('assets/images/logo').'/'.$logo_white }}"
                         class="img-fluid border-radius mt-2 border-0 shadow-sm" alt="" width="220">
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="logoSecond">Guardar</button>
            </div>
        </div>
    </form>
</div>
