<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => true];
        $mode = 'list';

        $actions = [
            'view' => null,
            'edit' => 'Editar',
            'go' => null,
            'delete' => 'Eliminar',
        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>


    @include('livewire.admin.category.update')
    @include('livewire.admin.category.create')


    <div class="col-md-12 list">


        @include('livewire.widgets.admin.table-basic')
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
