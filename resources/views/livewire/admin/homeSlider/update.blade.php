<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ACTUALIZAR HOME SLIDER</h5>
                <button type="button" wire:click="cleanError" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formEdit">

                    <div class="form-group">
                        <div class="" wire:ignore>
                            <label>Título</label>
                            <textarea placeholder="Título" wire:model="title"
                                      class="form-control title"></textarea>
                        </div>
                        @error('title') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <div class="" wire:ignore>
                            <label>Sub-título</label>
                            <textarea placeholder="Sub-título" wire:model="subtitle"
                                      class="form-control subtitle"></textarea>
                        </div>
                        @error('subtitle') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" placeholder="Precio" wire:model="price"
                               class="form-control input-md">
                        @error('price') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" placeholder="Link" wire:model="link"
                               class="form-control input-md">
                        @error('link') <span
                            class="error text-danger font-italic mt-1 font-italic">{!! $message !!}</span> @enderror
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
                            <img src="{{ asset('assets/images/sliders').'/'.$image_edit }}"
                                 class="list-thumbnail mt-2 border-0 shadow-sm" alt="" width="120">
                        @endif
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
                <button type="button" wire:click.prevent="updateSlider" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

