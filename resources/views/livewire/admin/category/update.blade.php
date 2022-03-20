<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Categoría</h5>
                <button type="button" wire:click="cleanError" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label>Categoría</label>
                        <input wire:model="name" wire:keyup="generateSlug" type="text" class="form-control" id="name"
                               placeholder="Name">@error('name') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input wire:model="slug" type="text" class="form-control" id="slug"
                               placeholder="Slug">
                        @error('slug') <span class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2-single"
                                wire:model="parent" data-width="100%" id="parent">
                            <option label="&nbsp;">&nbsp;Selecione una opcion</option>
                            @foreach($allCategories as $aCategory)
                                @if($aCategory->id !== $category_id)
                                    <option value="{{ $aCategory->id }}">
                                        {{ $aCategory->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('parent') <span class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="cleanError" class="btn btn-outline-primary"
                        data-dismiss="modal">Cancelar
                </button>
                <button type="button" wire:click.prevent="update" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
