<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => true];

        $items = [
            'id' => 'ID',
            'name' => 'Nombre',
            'created_at' => 'Fecha de Creación',
        ];
        $mode = 'list';
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>


    @include('livewire.admin.category.update')
    @include('livewire.admin.category.create')


    <div class="col-md-12 list">


        @foreach($categories as $category)
            <div class="card d-flex flex-row mb-3">
                <a class="d-flex" href="Pages.Product.Detail.html">
                    <img src="{{ asset('assets/admin/img/products/fat-rascal-thumb.jpg') }}" alt="Fat Rascal"
                         class="list-thumbnail responsive border-0 card-img-left"/>
                </a>
                <div class="pl-0 d-flex flex-grow-1 min-width-zero">
                    <div
                        class="card-body align-self-center d-flex flex-column flex-lg-row justify-content-between min-width-zero align-items-lg-center">
                        <a href="Pages.Product.Detail.html" class="w-30 w-sm-100 ml-0 mr-0 pl-0 pr-0">
                            <p class="list-item-heading mb-0 truncate">{{ $category->name }}</p>
                        </a>
                        <p class="mb-0 text-muted w-15 w-sm-100">{{ $category->slug }}</p>
                        <p class="mb-0 text-muted w-15 w-sm-100">{{ $category->parent }}</p>
                        <div class="w-15 w-sm-100">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Ver"><i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="edit({{ $category->id }})"
                                        data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="deleteConfirm({{ $category->id }})"
                                        data-placement="top" title="Eliminar"><i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="wrap-pagination-info">
            {{ $categories->links('livewire.widgets.admin-pagination-link') }}
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/jquery.contextMenu.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>
@endpush

@push('scripts')

    <script src="{{ asset('assets/admin/js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>


    <script type="text/javascript">
        document.addEventListener('livewire:load', function (event) {
            @this.
            on('refreshF', function () {
                let tooltip_ = $('[data-toggle="tooltip"]');
                tooltip_.tooltip('dispose');
                tooltip_.tooltip();
            });

            @this.
            on('closeModalUpdate', function () {
                $('#updateModal').modal('hide');
                $('.parent').val('')
            });

            @this.
            on('closeModal', function () {
                $('#addModal').modal('hide');
                $('.parent').val('')
            });
        });

        var parent = $('.parent');
        $(document).ready(function () {
            parent.select2();
            parent.on('change', function (e) {
                @this.
                set('parent', e.target.value);
            });
        });

        document.addEventListener('livewire:load', function (event) {
            @this.
            on('refreshDropdown', function () {
                parent.select2('destroy');
                parent.removeClass('select2-single');
                parent.addClass('select2-single');
                parent.select2();
            });

            @this.
            on('cleanError', function () {
                $('.error.text-danger').html('');
            });

            @this.
            on('showModal', function () {
                $('#updateModal').modal('show');
            });

            @this.
            on('addAlert', function () {
                notificationSwal('¡Categoría agregada correctamente!', 'success');
            });

            @this.
            on('editAlert', function () {
                notificationSwal('¡Categoría actualizada exitosamente!', 'success');
            });

            @this.
            on('deleteAlert', function () {
                deleteSwal();
            });

        });

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

        function deleteSwal() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary ml-3',
                    cancelButton: 'btn btn-danger mr-3'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminarlo!',
                cancelButtonText: 'No, Cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emit('activeConfirm');

                    swalWithBootstrapButtons.fire(
                        '¡Eliminado!',
                        'El registro ha sido eliminado. <i class="far fa-dizzy text-danger"></i>',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        '¡Cancelado!',
                        'Tu registro está a salvo <i class="far fa-smile-beam text-primary"></i>',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
