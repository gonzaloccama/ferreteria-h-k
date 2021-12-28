<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                ADD NEW SLIDER
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.homeslider')  }}" class="btn btn-success pull-right">REGRESAR</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addSlide">

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">TITLE</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="TITLE" wire:model="title"
                                           id="title" class="form-control input-md">
                                    @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subtitle" class="col-md-4 control-label">SUB TITLE</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="SUB TITLE" wire:model="subtitle"
                                           id="subtitle" class="form-control input-md">
                                    @error('subtitle') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-md-4 control-label">PRICE</label>
                                <div class="col-md-6">
                                   <input type="text" placeholder="PRICE" wire:model="price"
                                             id="price" class="form-control input-md">
                                    @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-md-4 control-label">LINK</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="LINK" wire:model="link"
                                              id="link" class="form-control input-md">
                                    @error('link') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="col-md-4 control-label">SLIDER IMAGE</label>
                                <div class="col-md-6">
                                    <input type="file" wire:model="image"
                                           id="image" class="form-control input-file" accept="image/jpeg, image/png">
                                    @error('image') <span class="error text-danger">{{ $message }}</span><br> @enderror
                                    @if($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="" width="120">
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="status" class="col-md-4 control-label">STATUS</label>
                                <div class="col-md-6">
                                    <select placeholder="STATUS" wire:model="status"
                                            id="status" class="form-control input-md">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary pull-right" value="Guardar">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
