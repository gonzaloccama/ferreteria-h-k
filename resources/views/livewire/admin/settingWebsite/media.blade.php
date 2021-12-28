<div class="mb-5">
    <h3 class="card-title">Media Social</h3>
    <form>
        <div class="form-group row">
            <label for="facebook" class="col-sm-3 col-form-label">FACEBOOK</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="facebook" placeholder="Facebook" name="media_social[facebook]" wire:model="media_social.facebook">
            </div>
        </div>

        <div class="form-group row">
            <label for="whatsapp" class="col-sm-3 col-form-label">WHATSAPP</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="whatsapp" placeholder="Whatsapp" name="media_social[whatsapp]" wire:model="media_social.whatsapp">
            </div>
        </div>

        <div class="form-group row">
            <label for="youtube" class="col-sm-3 col-form-label">YOUTUBE</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="youtube" placeholder="Youtube" name="media_social[youtube]" wire:model="media_social.youtube">
            </div>
        </div>

        <div class="form-group row">
            <label for="twitter" class="col-sm-3 col-form-label">TWITTER</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="twitter" placeholder="Twitter" name="media_social[twitter]" wire:model="media_social.twitter">
            </div>
        </div>

        <div class="form-group row">
            <label for="telegram" class="col-sm-3 col-form-label">TELEGRAM</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="telegram" placeholder="Telegram" name="media_social[telegram]" wire:model="media_social.telegram">
            </div>
        </div>

        <div class="form-group row">
            <label for="instagram" class="col-sm-3 col-form-label">INSTAGRAM</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="instagram" placeholder="Telegram" name="media_social[instagram]" wire:model="media_social.instagram">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="socialMedia">Guardar</button>
            </div>
        </div>

    </form>
</div>
