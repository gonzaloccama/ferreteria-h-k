<div class="mb-5 clean-section">
    <h3 class="card-title">Misión y Vision</h3>
    <form>

        <div class="form-group row">
            <label for="mission" class="col-sm-3 col-form-label">MISIÓN</label>
            <div class="col-sm-9">
                <textarea placeholder="Misión" id="mission" wire:model="mission"
                          class="form-control mission" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="vision" class="col-sm-3 col-form-label">VISIÓN</label>
            <div class="col-sm-9">
                <textarea placeholder="Visión" id="vision" wire:model="vision"
                          class="form-control vision" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="missionAndVision">Guardar
                </button>
            </div>
        </div>
    </form>
</div>

