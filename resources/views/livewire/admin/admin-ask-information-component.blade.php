<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];
        $mode = 'list';

        $actions = [
            'view' => 'Detalles',
            'edit' => null,
            'go' => null,
            'delete' => 'Eliminar',
        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    @if($modeUpdate == 'view')
        @include('livewire.admin.askInformation.view')
    @endif

    <div class="col-md-12 list">
        @include('livewire.widgets.admin.table-basic')
    </div>
</div>

@push('styles')

@endpush

@push('scripts')

    <script type="text/javascript">

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshF', function () {

            let tooltip_ = $('[data-toggle="tooltip"]');

            tooltip_.tooltip('dispose');
            tooltip_.tooltip('hide');
            tooltip_.tooltip();
        });


        @this.on('showModalView', function () {
            $('#viewModal').modal('show')
        })

        @this.on('closeModalView', function () {
            $('#viewModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop.fade.show').remove();
        });

        @this.on('cleanError', function () {
            $('.error.text-danger').html('');
        });

        @this.on('deleteAlert', function () {
            deleteSwal();
        });
        });

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

