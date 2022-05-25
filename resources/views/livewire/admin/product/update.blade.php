<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">{{ $name ?? 'ACTUALIZAR PRODUCTO' }}</h5>
                <button type="button" wire:click="cleanError" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="formAdd">
                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Nombre</label>--}}
                    {{--                            <input type="text" placeholder="Nombre del producto" wire:model="name"--}}
                    {{--                                   wire:keyup="generateSlug" class="form-control input-md">--}}
                    {{--                            @error('name') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'name',
                        'text' => 'Producto',
                        'required' => 1,
                        'type' => 'text',
                        'keyup' => 'generateSlug',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Slug</label>--}}
                    {{--                            <input type="text" placeholder="Slug" wire:model="slug" class="form-control input-md">--}}
                    {{--                            @error('slug') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'slug',
                        'text' => 'Slug',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <div class="" wire:ignore>--}}
                    {{--                                <label>Descripción corta</label>--}}
                    {{--                                <textarea placeholder="Descripción corta" wire:model="short_description" id="short_description"--}}
                    {{--                                          class="form-control short_description"></textarea>--}}
                    {{--                            </div>--}}
                    {{--                            @error('short_description') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'short_description',
                        'text' => 'Descripción corta',
                        'required' => 1,
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.textarea-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <div class="" wire:ignore>--}}
                    {{--                                <label>Descripción</label>--}}
                    {{--                                <textarea placeholder="Descripción" wire:model="description" id="description"--}}
                    {{--                                          class="form-control description"></textarea>--}}
                    {{--                            </div>--}}
                    {{--                            @error('description') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'description',
                        'text' => 'Descripción',
                        'required' => 1,
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.textarea-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>URL del video</label>--}}
                    {{--                            <input type="text" placeholder="URL del video" wire:model="video_url"--}}
                    {{--                                   class="form-control input-md">--}}
                    {{--                            @error('video_url') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'video_url',
                        'text' => 'URL del video',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Precio regular</label>--}}
                    {{--                            <input type="text" placeholder="Precio regular" wire:model="regular_price"--}}
                    {{--                                   class="form-control input-md">--}}
                    {{--                            @error('regular_price') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'regular_price',
                        'text' => 'Precio regular',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Precio descuento</label>--}}
                    {{--                            <input type="text" placeholder="Precio descuento" wire:model="sale_price"--}}
                    {{--                                   class="form-control input-md">--}}
                    {{--                            @error('sale_price') <span--}}
                    {{--                                class="error text-danger font-italic mt-1 font-italic">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'sale_price',
                        'text' => 'Precio descuento',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>SKU</label>--}}
                    {{--                            <input type="text" placeholder="SKU" wire:model="SKU"--}}
                    {{--                                   id="SKU" class="form-control input-md">--}}
                    {{--                            @error('SKU') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'SKU',
                        'text' => 'SKU',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Stock</label>--}}
                    {{--                            <select placeholder="Stock" wire:model="stock_status"--}}
                    {{--                                    id="stock_status" class="form-control input-md">--}}
                    {{--                                <option value="Instock">InStock</option>--}}
                    {{--                                <option value="outofstock">Out of Stock</option>--}}
                    {{--                            </select>--}}
                    {{--                            @error('stock_status') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'stock_status',
                        'text' => 'Stock',
                        'required' => 1,
                        'object' => 'array',
                        'options' => [
                            ['id' => 'instock', 'name' => 'En stock'],
                            ['id' => 'outofstock', 'name' => 'Agotado'],
                        ],
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.select-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Featured</label>--}}
                    {{--                            <select placeholder="Featured" wire:model="featured"--}}
                    {{--                                    id="featured" class="form-control input-md">--}}
                    {{--                                <option value="0">No</option>--}}
                    {{--                                <option value="1">Yes</option>--}}
                    {{--                            </select>--}}
                    {{--                            @error('featured') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'featured',
                        'text' => 'Destacado',
                        'required' => 1,
                        'object' => null,
                        'options' => [
                            'No',
                            'Si',
                        ],
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.select-h', $dt)

                    {{--                        <div class="form-group">--}}
                    {{--                            <label>Cantidad</label>--}}
                    {{--                            <input type="text" placeholder="Quantity" wire:model="quantity"--}}
                    {{--                                   id="quantity" class="form-control input-md">--}}
                    {{--                            @error('quantity') <span--}}
                    {{--                                class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                        </div>--}}

                    <?php
                    $dt = [
                        'name' => 'quantity',
                        'text' => 'Cantidad',
                        'required' => 1,
                        'type' => 'text',
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.input-h', $dt)

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Imagen <i class="text-danger">*</i></label>
                        <div class="col-sm-9 @error('image') error-validate @enderror ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" wire:model="newimage"
                                       accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                            <div wire:loading wire:target="image">Cargando...</div>
                            @error('newimage') <span
                                class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                            @if($newimage)
                                <img src="{{ $newimage->temporaryUrl() }}"
                                     class="list-thumbnail mt-2 border-0 shadow-sm" alt="" width="120">
                            @else
                                <img src="{{ asset('assets/images/products').'/'.$image_edit }}"
                                     class="list-thumbnail mt-2 border-0 shadow-sm" alt="" width="120">
                            @endif
                        </div>

                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Galería <i class="text-danger">*</i></label>
                        <div class="col-sm-9 @error('image') error-validate @enderror ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" wire:model="newimages"
                                       accept="image/jpeg, image/png" multiple>
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                            <div wire:loading wire:target="image">Cargando...</div>
                            @error('newimages') <span
                                class="error text-danger font-italic mt-1">{!! $message !!}</span><br> @enderror
                            @if($newimages)
                                @foreach($newimages as $image)
                                    <img src="{{ $image->temporaryUrl() }}"
                                         class="list-thumbnail mt-2 border-0 shadow-sm"
                                         alt="" style="width: 80px !important; height: 80px !important;">
                                @endforeach
                            @else
                                @if(filled($images_edit))
                                    @foreach($images_edit as $img)
                                        <img src="{{ asset('assets/images/products/gallery') . '/' . $img }}"
                                             class="list-thumbnail mt-2 border-0 shadow-sm" alt=""
                                             style="width: 80px !important; height: 80px !important;">
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>

                    {{--                    <div class="form-group">--}}
                    {{--                        <label>Categoria</label>--}}
                    {{--                        <div class="">--}}
                    {{--                            <select placeholder="Category" wire:model="category_id"--}}
                    {{--                                    data-width="100%" class="form-control select2-single category_id">--}}
                    {{--                                <option value="">Select Category</option>--}}
                    {{--                                @foreach($categories as $category)--}}
                    {{--                                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                        @error('category_id') <span--}}
                    {{--                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror--}}
                    {{--                    </div>--}}

                    <?php
                    $dt = [
                        'name' => 'category_id',
                        'text' => 'Categoría',
                        'required' => 1,
                        'object' => 'name',
                        'options' => $categories,
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.select-h', $dt)

                    <?php
                    $dt = [
                        'name' => 'brand_id',
                        'text' => 'Marca',
                        'required' => 1,
                        'object' => 'name',
                        'options' => \App\Models\Brand::all(),
                    ];
                    ?>
                    @include('livewire.widgets.admin.form.select-h', $dt)

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="cleanError" class="btn btn-outline-primary" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click.prevent="updateProduct" class="btn btn-primary close-modal">Guardar
                </button>
            </div>
        </div>
    </div>
</div>
