<div class="row">
    <div class="col-md-12">

        <div class="mb-3 title-page">
            <h1>{{ $title }}</h1>@push('title'){{ $pageTitle }}@endpush
            <div class="text-zero top-right-button-container">
                <a href="javascript:;" onclick="goBack()" class="btn btn-primary top-right-button">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 8 8 12 12 16"></polyline>
                        <line x1="16" y1="12" x2="8" y2="12"></line>
                    </svg>
                    REGRESAR
                </a>
            </div>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

        </div>
        <div class="separator mb-5"></div>
    </div>

    <div class="card mb-4 col-md-12">
        <div class="card-body">
            <form enctype="multipart/form-data" wire:submit.prevent="addProduct">

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre del Producto</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Nombre del producto" wire:model="name" id="name"
                               wire:keyup="generateSlug" class="form-control input-md">
                        @error('name') <span class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Slug" id="slug" wire:model="slug" class="form-control">
                        @error('slug') <span class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="short_description" class="col-sm-2 col-form-label">Descripción corta</label>
                    <div class="col-sm-10">
                        <div class="" wire:ignore>
                        <textarea placeholder="Descripción corta" wire:model="short_description" id="short_description"
                                  class="form-control short_description"></textarea>
                        </div>
                        @error('short_description') <span
                            class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <div class="" wire:ignore>
                            <textarea placeholder="Descripción" wire:model="description" id="description"
                                      class="form-control description"></textarea>
                        </div>
                        @error('description') <span
                            class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="regular_price" class="col-sm-2 col-form-label">Precio regular</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Precio regular" wire:model="regular_price" id="regular_price"
                               class="form-control input-md">
                        @error('regular_price') <span
                            class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sale_price" class="col-sm-2 col-form-label">Precio descuento</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Precio descuento" wire:model="sale_price" id="sale_price"
                               class="form-control input-md">
                        @error('sale_price') <span
                            class="error text-danger font-italic font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="SKU" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="SKU" wire:model="SKU"
                               id="SKU" class="form-control input-md">
                        @error('SKU') <span class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stock_status" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                        <select placeholder="Stock" wire:model="stock_status"
                                id="stock_status" class="form-control input-md">
                            <option value="Instock">InStock</option>
                            <option value="outofstock">Out of Stock</option>
                        </select>
                        @error('stock_status') <span
                            class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="featured" class="col-sm-2 col-form-label">Featured</label>
                    <div class="col-sm-10">
                        <select placeholder="Featured" wire:model="featured"
                                id="featured" class="form-control input-md">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('featured') <span class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-form-label">Cantidad</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="Cantidad" wire:model="quantity"
                               id="quantity" class="form-control input-md">
                        @error('quantity') <span class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Imagen del Producto</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" wire:model="image"
                                   accept="image/jpeg, image/png">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <div wire:loading wire:target="image">Cargando...</div>
                        @error('image') <span
                            class="error text-danger font-italic mt-1">{{ $message }}</span><br> @enderror
                        @if($image)
                            <img src="{{ $image->temporaryUrl() }}"
                                 class="list-thumbnail mt-2 border-0 shadow-sm"
                                 alt="" width="120">
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Imagen del Producto</label>
                    <div class="col-sm-10">
                        <div class="" wire:ignore>
                            <select placeholder="Category" wire:model="category_id" id="category_id"
                                    data-width="100%" class="form-control select2-single category_id">
                                <option label="">Seleccionar categoria...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id') <span
                            class="error text-danger font-italic">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-sm-11 text-right">
                        <button type="submit" class="btn btn-primary close-modal">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>--}}


{{--@endpush--}}

{{--@push('scripts')--}}
{{--    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>--}}

{{--    <script src="https://cdn.tiny.cloud/1/5wluuwcotje5s8xdln9xow6hslx4jcmygiorj4w3smgsuamd/tinymce/5/tinymce.min.js"--}}
{{--            referrerpolicy="origin"></script>--}}


{{--    <script type="text/javascript">--}}
{{--        var category_id = $('.category_id');--}}
{{--        $(document).ready(function () {--}}
{{--            category_id.select2();--}}
{{--            category_id.on('change', function (e) {--}}
{{--            @this.set('category_id', e.target.value);--}}
{{--            });--}}

{{--            loadTinyMce('textarea.short_description', 'short_description');--}}

{{--            loadTinyMce('textarea.description', 'description');--}}

{{--        });--}}

{{--        document.addEventListener('livewire:load', function (event) {--}}
{{--        @this.on('refreshDropdown', function () {--}}
{{--            tinymce.remove();--}}

{{--            loadTinyMce('textarea.short_description', 'short_description');--}}

{{--            loadTinyMce('textarea.description', 'description');--}}

{{--            category_id.select2('destroy');--}}
{{--            category_id.removeClass('select2-single');--}}
{{--            category_id.addClass('select2-single');--}}
{{--            category_id.select2();--}}
{{--        });--}}
{{--        });--}}

{{--        function loadTinyMce(sel, varModel) {--}}
{{--            tinymce.init({--}}
{{--                selector: sel,--}}
{{--                // height: (window.innerHeight - 480),--}}
{{--                forced_root_block: false,--}}
{{--                setup: function (editor) {--}}
{{--                    editor.on('init change', function () {--}}
{{--                        editor.save();--}}
{{--                    });--}}
{{--                    editor.on('change', function (e) {--}}
{{--                    @this.set(varModel, editor.getContent());--}}
{{--                    });--}}
{{--                },--}}
{{--            });--}}
{{--        }--}}

{{--        function goBack() {--}}
{{--            window.history.back();--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}


@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>

    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var sel_categories = $('#category_id');

            sel_categories.select2();
            sel_categories.on('change', function (e) {
            @this.set('category_id', e.target.value);
            });

            loadTinyMce('textarea#short_description', 'short_description');

            loadTinyMce('textarea#description', 'description');

        });

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshDropdown', function () {
            tinymce.remove();
            $('#category_id').select2();

            loadTinyMce('textarea#short_description', 'short_description');

            loadTinyMce('textarea#description', 'description');
        });
        });

        function loadTinyMce(sel, varModel) {
            tinymce.init({
                selector: sel,
                // height: (window.innerHeight - 480),
                forced_root_block: false,
                setup: function (editor) {
                    editor.on('init change', function () {
                        editor.save();
                    });
                    editor.on('change', function (e) {
                    @this.set(varModel, editor.getContent());
                    });
                },
            });
        }


        function goBack() {
            window.history.back();
        }
    </script>
@endpush


{{--<div>--}}
{{--    <div class="container" style="padding: 30px 0;">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                ADD NEW PRODUCT--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <a href="{{ route('admin.products')  }}" class="btn btn-success pull-right">REGRESAR</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="panel-body">--}}
{{--                        @if(Session::has('message'))--}}
{{--                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>--}}
{{--                        @endif--}}
{{--                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="name" class="col-md-4 control-label">Product Name</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="Product Name" wire:model="name"--}}
{{--                                           wire:keyup="generateSlug"--}}
{{--                                           id="name" class="form-control input-md">--}}
{{--                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="slug" class="col-md-4 control-label">Product Slug</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="Product Slug" wire:model="slug"--}}
{{--                                           id="slug" class="form-control input-md">--}}
{{--                                    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="short_description" class="col-md-4 control-label">Short Description</label>--}}
{{--                                <div class="col-md-6" wire:ignore>--}}
{{--                                   <textarea placeholder="Short Description" wire:model="short_description"--}}
{{--                                             id="short_description" class="form-control input-md"></textarea>--}}
{{--                                    @error('short_description') <span--}}
{{--                                        class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="description" class="col-md-4 control-label">Description</label>--}}
{{--                                <div class="col-md-6" wire:ignore>--}}
{{--                                    <textarea placeholder="Description" wire:model="description"--}}
{{--                                              id="description" class="form-control input-md"></textarea>--}}
{{--                                    @error('description') <span--}}
{{--                                        class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="regular_price" class="col-md-4 control-label">Regular Price</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="Regular Price" wire:model="regular_price"--}}
{{--                                           id="regular_price" class="form-control input-md">--}}
{{--                                    @error('regular_price') <span--}}
{{--                                        class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="sale_price" class="col-md-4 control-label">Price</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="Price" wire:model="sale_price"--}}
{{--                                           id="sale_price" class="form-control input-md">--}}
{{--                                    @error('sale_price') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="SKU" class="col-md-4 control-label">SKU</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="SKU" wire:model="SKU"--}}
{{--                                           id="SKU" class="form-control input-md">--}}
{{--                                    @error('SKU') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="stock_status" class="col-md-4 control-label">Stock</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select placeholder="Stock" wire:model="stock_status"--}}
{{--                                            id="stock_status" class="form-control input-md">--}}
{{--                                        <option value="Instock">InStock</option>--}}
{{--                                        <option value="outofstock">Out of Stock</option>--}}
{{--                                    </select>--}}
{{--                                    @error('stock_status') <span--}}
{{--                                        class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="featured" class="col-md-4 control-label">Featured</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <select placeholder="Featured" wire:model="featured"--}}
{{--                                            id="featured" class="form-control input-md">--}}
{{--                                        <option value="0">No</option>--}}
{{--                                        <option value="1">Yes</option>--}}
{{--                                    </select>--}}
{{--                                    @error('featured') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="quantity" class="col-md-4 control-label">Quantity</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="text" placeholder="Quantity" wire:model="quantity"--}}
{{--                                           id="quantity" class="form-control input-md">--}}
{{--                                    @error('quantity') <span class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="image" class="col-md-4 control-label">Product Image</label>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="file" wire:model="image" accept="image/jpeg, image/png"--}}
{{--                                           id="image" class="form-control input-file">--}}
{{--                                    @error('image') <span class="error text-danger">{{ $message }}</span><br> @enderror--}}
{{--                                    @if($image)--}}
{{--                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="120">--}}
{{--                                    @endif--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="category_id" class="col-md-4 control-label">Category</label>--}}
{{--                                <div class="col-md-6" id="for-picker" wire:ignore>--}}
{{--                                    <select placeholder="Category" data-container="#for-picker" wire:model="category_id"--}}
{{--                                            id="category_id" data-live-search="true" class="form-control input-md">--}}
{{--                                        <option value="">Select Category</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @error('category_id') <span--}}
{{--                                        class="error text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <input type="submit" class="btn btn-primary pull-right" value="Enviar">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--@push('styles')--}}
{{--    <link rel="stylesheet"--}}
{{--          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">--}}
{{--@endpush--}}

{{--@push('scripts')--}}
{{--    <!-- Latest compiled and minified JavaScript -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}
{{--    <script src="https://cdn.tiny.cloud/1/5wluuwcotje5s8xdln9xow6hslx4jcmygiorj4w3smgsuamd/tinymce/5/tinymce.min.js"--}}
{{--            referrerpolicy="origin"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            var sel_categories = $('#category_id');--}}

{{--            sel_categories.selectpicker();--}}
{{--            sel_categories.on('change', function (e) {--}}
{{--            @this.set('category_id', e.target.value);--}}
{{--            });--}}

{{--            loadTinyMce('textarea#short_description', 'short_description');--}}

{{--            loadTinyMce('textarea#description', 'description');--}}

{{--        });--}}

{{--        document.addEventListener('livewire:load', function (event) {--}}
{{--        @this.on('refreshDropdown', function () {--}}
{{--            tinymce.remove();--}}
{{--            $('#category_id').selectpicker();--}}

{{--            loadTinyMce('textarea#short_description', 'short_description');--}}

{{--            loadTinyMce('textarea#description', 'description');--}}
{{--        });--}}
{{--        });--}}

{{--        function loadTinyMce(sel, varModel) {--}}
{{--            tinymce.init({--}}
{{--                selector: sel,--}}
{{--                // height: (window.innerHeight - 480),--}}
{{--                forced_root_block: false,--}}
{{--                setup: function (editor) {--}}
{{--                    editor.on('init change', function () {--}}
{{--                        editor.save();--}}
{{--                    });--}}
{{--                    editor.on('change', function (e) {--}}
{{--                    @this.set(varModel, editor.getContent());--}}
{{--                    });--}}
{{--                },--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
