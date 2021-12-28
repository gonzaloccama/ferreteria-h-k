<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                EDIT PRODUCT
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.products')  }}" class="btn btn-success pull-right">REGRESAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateProduct">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Product Name" wire:model="name"
                                           wire:keyup="generateSlug"
                                           id="name" class="form-control input-md">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="slug" class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Product Slug" wire:model="slug"
                                           id="slug" class="form-control input-md">
                                    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group" wire:ignore>
                                <label for="short_description" class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-6">
                                   <textarea placeholder="Short Description" wire:model="short_description"
                                             id="short_description" class="form-control input-md"></textarea>
                                    @error('short_description') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-md-4 control-label">Description</label>
                                <div class="col-md-6" wire:ignore>
                                    <textarea placeholder="Description" wire:model="description"
                                              id="description" class="form-control input-md"></textarea>
                                    @error('description') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="regular_price" class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Regular Price" wire:model="regular_price"
                                           id="regular_price" class="form-control input-md">
                                    @error('regular_price') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sale_price" class="col-md-4 control-label">Price</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Price" wire:model="sale_price"
                                           id="sale_price" class="form-control input-md">
                                    @error('sale_price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="SKU" class="col-md-4 control-label">SKU</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="SKU" wire:model="SKU"
                                           id="SKU" class="form-control input-md">
                                    @error('SKU') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="stock_status" class="col-md-4 control-label">Stock</label>
                                <div class="col-md-6" wire:ignore>
                                    <select placeholder="Stock" wire:model="stock_status"
                                            id="stock_status" class="form-control input-md">
                                        <option value="Instock">InStock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="featured" class="col-md-4 control-label">Featured</label>
                                <div class="col-md-6">
                                    <select placeholder="Featured" wire:model="featured"
                                            id="featured" class="form-control input-md">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="col-md-4 control-label">Quantity</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Quantity" wire:model="quantity"
                                           id="quantity" class="form-control input-md">
                                    @error('quantity') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">Product Image</label>
                                <div class="col-md-6">
                                    <input type="file" wire:model="newimage" accept="image/jpeg, image/png"
                                           id="image" class="form-control input-file">
                                    @error('newimage') <span
                                        class="error text-danger">{{ $message }}</span><br> @enderror
                                    @if($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" alt="" width="120">
                                    @else
                                        <img src="{{ asset('assets/images/products').'/'.$image }}" alt="" width="120">
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id" class="col-md-4 control-label">Category</label>
                                <div class="col-md-6" id="for-picker" wire:ignore>
                                    <select placeholder="Category" data-live-search="true" wire:model="category_id"
                                            id="category_id" data-container="#for-picker" class="form-control input-md">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary pull-right" value="Update">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewire:load', function () {
        // Your JS here.
    })
</script>

@push('styles')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/5wluuwcotje5s8xdln9xow6hslx4jcmygiorj4w3smgsuamd/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var sel_categories = $('#category_id');

            sel_categories.selectpicker();
            sel_categories.on('change', function (e) {
            @this.set('category_id', e.target.value);
            });

            loadTinyMce('textarea#short_description', 'short_description');

            loadTinyMce('textarea#description', 'description');

        });

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshDropdown', function () {
            tinymce.remove();
            $('#category_id').selectpicker();

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
    </script>
@endpush
