<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">Actualizar Atributo</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div>
                            <label for="name">Atributo</label>
                            <input type="text" id="name" placeholder="Atributo" wire:model="name"
                                   class="form-control input-md">
                        </div>
                        @error('name') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-primary" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click.prevent="updateData" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>



