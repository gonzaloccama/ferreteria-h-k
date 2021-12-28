<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Category
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}"
                                   class="btn btn-success pull-right">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="" class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Category Name" wire:model="name"
                                           wire:keyup="generateSlug"
                                           id="name" class="form-control input-md">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="slug" class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Category Slug" wire:model="slug"
                                           id="slug" class="form-control input-md">
                                    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="parent" class="col-md-4 control-label">Parent</label>
                                <div class="col-md-6" id="for-picker" wire:ignore>
                                    <select class="form-control" data-live-search="true" id="parent"
                                            data-container="#for-picker" wire:model="parent">
                                        <option value="" selected>Select Category...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('parent') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@push('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var sel_categories = $('#parent');

            sel_categories.selectpicker();
            sel_categories.on('change', function (e) {
                var data = sel_categories.selectpicker('val');
            @this.set('parent', data);
            });
        });

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshDropdown', function () {
            $('#parent').selectpicker('refresh');
        });
        });
    </script>
@endpush
