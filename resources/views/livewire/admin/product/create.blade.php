<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
<<<<<<< HEAD
    <div class="modal-dialog modal-lg">
=======
    <div class="modal-dialog">
>>>>>>> d919df688e857e106130ff058414f5f9a0980d52
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">NUEVO PRODUCTO</h5>
                <button type="button" wire:click="cleanError" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formAdd">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" placeholder="Nombre del producto" wire:model="name"
                               wire:keyup="generateSlug" class="form-control input-md">
                        @error('name') <span class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" placeholder="Slug" wire:model="slug" class="form-control input-md">
                        @error('slug') <span class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <div class="" wire:ignore>
                            <label>Descripción corta</label>
                            <textarea placeholder="Descripción corta" wire:model="short_description"
                                      class="form-control short_description" ></textarea>
                        </div>
                        @error('short_description') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <div class="" wire:ignore>
                            <label>Descripción</label>
                            <textarea placeholder="Descripción" wire:model="description"
                                      class="form-control description"></textarea>
                        </div>
                        @error('description') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>URL del video</label>
                        <input type="text" placeholder="URL del video" wire:model="video_url"
                               class="form-control input-md">
                        @error('video_url') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Precio regular</label>
                        <input type="text" placeholder="Precio regular" wire:model="regular_price"
                               class="form-control input-md">
                        @error('regular_price') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Precio descuento</label>
                        <input type="text" placeholder="Precio descuento" wire:model="sale_price"
                               class="form-control input-md">
                        @error('sale_price') <span
                            class="error text-danger font-italic mt-1 font-italic">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" placeholder="SKU" wire:model="SKU"
                               id="SKU" class="form-control input-md">
                        @error('SKU') <span class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Stock</label>
                        <select placeholder="Stock" wire:model="stock_status"
                                id="stock_status" class="form-control input-md">
                            <option value="Instock">InStock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                        @error('stock_status') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Featured</label>
                        <select placeholder="Featured" wire:model="featured"
                                id="featured" class="form-control input-md">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('featured') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="text" placeholder="Quantity" wire:model="quantity"
                               id="quantity" class="form-control input-md">
                        @error('quantity') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Imagen</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" wire:model="image"
                                   accept="image/jpeg, image/png">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <div wire:loading wire:target="image">Cargando...</div>
                        @error('image') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}"
                                 class="list-thumbnail mt-2 border-0 shadow-sm"
                                 alt="" style="width: 240px !important; height: 240px !important;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Galeria de imagenes</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" wire:model="images"
                                   accept="image/jpeg, image/png" multiple>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <div wire:loading wire:target="image">Cargando...</div>
                        @error('images') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                        @if($images)
                            @foreach($images as $image)
                                <img src="{{ $image->temporaryUrl() }}"
                                     class="list-thumbnail mt-2 border-0 shadow-sm"
                                     alt="" style="width: 80px !important; height: 80px !important;">
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>

                            <select placeholder="Category" wire:model="category_id"
                                    data-width="100%" class="form-control select2-single category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        @error('category_id') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="cleanError" class="btn btn-outline-primary" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click.prevent="store" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
