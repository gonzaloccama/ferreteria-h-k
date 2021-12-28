<div wire:ignore.self class="modal fade" id="editModal" role="dialog"
     aria-labelledby="editModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR MARCA DE PRODUCTO</h5>
                <button type="button" wire:click="cleanError" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formAdd">

                    <div class="form-group">
                        <div>
                            <label>Nombre</label>
                            <input type="text" placeholder="Nombre" wire:model="name"
                                   class="form-control input-md">
                        </div>
                        @error('name') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Imagen</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" wire:model="newimage"
                                   accept="image/jpeg, image/png">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <div wire:loading wire:target="image">Cargando...</div>
                        @error('newimage') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                        @if($newimage)
                            <img src="{{ $newimage->temporaryUrl() }}" class="list-thumbnail mt-2 border-0 shadow-sm"
                                 alt="" width="120">
                        @else
                            <img src="{{ asset('assets/images/brands').'/'.$image_edit }}"
                                 class="list-thumbnail mt-2 border-0 shadow-sm" alt="" width="120">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" placeholder="Link" wire:model="website"
                               class="form-control input-md">
                        @error('website') <span
                            class="error text-danger font-italic mt-1 font-italic">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <select placeholder="Estado" wire:model="status"
                                id="status" class="form-control input-md">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        @error('status') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="cleanError" class="btn btn-outline-primary" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click.prevent="updateBrand" class="btn btn-primary close-modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>

