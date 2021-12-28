<div class="mb-5">
    <h3 class="card-title">Banner de novedades</h3>
    <form>
        <div class="form-group row">

            <label for="banner_top" class="col-sm-3 col-form-label">Banners</label>

            <div class="col-sm-9">
                <input type="text" class="form-control mb-3" id="banner_top-1" placeholder="Banner 1" name="banner_top[]" wire:model="banner_top.1">
                <input type="text" class="form-control mb-3" id="banner_top-2" placeholder="Banner 2" name="banner_top[]" wire:model="banner_top.2">
                <input type="text" class="form-control mb-3" id="banner_top-3" placeholder="Banner 3" name="banner_top[]" wire:model="banner_top.3">
                <input type="text" class="form-control mb-3" id="banner_top-4" placeholder="Banner 4" name="banner_top[]" wire:model="banner_top.4">
                <input type="text" class="form-control mb-3" id="banner_top-5" placeholder="Banner 5" name="banner_top[]" wire:model="banner_top.5">
                <input type="text" class="form-control mb-3" id="banner_top-6" placeholder="Banner 6" name="banner_top[]" wire:model="banner_top.6">
                <input type="text" class="form-control mb-3" id="banner_top-7" placeholder="Banner 7" name="banner_top[]" wire:model="banner_top.7">

            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="bannerTop">Guardar</button>
            </div>
        </div>

    </form>
</div>
