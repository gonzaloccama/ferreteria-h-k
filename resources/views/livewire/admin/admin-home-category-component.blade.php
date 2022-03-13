<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];
        ?>

        @include('livewire.widgets.admin.title-page')

        <div class="separator mb-5"></div>
    </div>

    <div class="col-12">

        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="selectCategories" class="col-sm-2 col-form-label">Elegir categorias</label>
                        <div class="col-md-10" wire:ignore>
                            <select class="form-control select2-single categories"
                                    wire:model="selectCategories" multiple="multiple" data-width="100%">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numberOfProducts" class="col-sm-2 col-form-label">Numero de productos</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="numberOfProducts" placeholder="1"
                                   wire:model="numberOfProducts">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="updateHomeCategory">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            activeSelect2('.categories', 'selectCategories');

            window.livewire.on('refreshDropdown', () => {
                activeSelect2('.categories', 'selectCategories');
            });

            window.livewire.on('alertSuccess', () => {
                notificationSwal('¡Home Category se ha actualizado exitosamente!');
            });
        });

        function activeSelect2(sel, varModel) {
            $(sel).select2();
            $(sel).on('change', function (e) {
                let data = $(this).val();
            @this.set(varModel, data);
            });
        }

        function notificationSwal(mssg, stl) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: stl,
                title: mssg
            })
        }

    </script>
@endpush
