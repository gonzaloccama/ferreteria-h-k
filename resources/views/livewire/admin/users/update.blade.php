<div wire:ignore.self class="modal fade" id="showModal" role="dialog"
     aria-labelledby="showModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">{{ $name }}</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div>
                            <label for="name">Nombres</label>
                            <input type="text" id="name" placeholder="Nombres" wire:model="name"
                                   class="form-control input-md">
                        </div>
                        @error('name') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror

                        <div class="mt-3">
                            <label for="email">Correo Electrónico</label>
                            <input type="text" id="email" placeholder="Correo Electrónico" wire:model="email" readonly
                                   class="form-control input-md">
                        </div>
                        @error('email') <span
                            class="error text-danger font-italic mt-1">{!! $message !!}</span> @enderror


                        <div class="mt-3">
                            <label for="utype">Rol de usuario</label>
                            {{--                            <input type="text" id="utype" placeholder="Rol de usuario" wire:model="utype"--}}
                            {{--                                   class="form-control input-md">--}}
                            <select name="" id="utype" wire:model="utype"
                                    class="form-control input-md">
                                <option value="ADM">Administrador</option>
                                <option value="USR">Usuario</option>
                                <option value="SLE">Vendedor</option>
                            </select>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-primary" data-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" wire:click.prevent="updateData" class="btn btn-primary close-modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>
