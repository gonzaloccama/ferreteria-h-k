<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];

        $items = [
            'id' => 'ID',
            'info_names' => 'Nombres',
            'info_email' => 'Correo',
            'info_celular' => 'Celular',
            'created_at' => 'Fecha de Creación',
        ];
        $mode = 'list';
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    @if($modeUpdate == 'view')
        @include('livewire.admin.askInformation.view')
    @endif

    <div class="col-md-12 list">

        <div class="border">
            <div class="card-body" style="overflow-x: auto">
                <table class="table responsive">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">WHATSAPP</th>
                        <th scope="col">FECHA</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($asks as $ask)
                        <tr>
                            <th class="align-middle" scope="row">{{ $ask->id }}</th>
                            <td class="align-middle">{{ $ask->info_names }}</td>
                            <td class="align-middle"><a href="mailto:{{ $ask->info_email }}">{{ $ask->info_email }}</a>
                            </td>
                            <td class="align-middle"><a
                                    href="tel:+51{{ $ask->info_celular }}">{{ $ask->info_celular }}</a></td>
                            <td class="align-middle">
                                @if(isset($ask->info_whatsapp) && !empty($ask->info_whatsapp) && $ask->info_whatsapp != '')
                                    <a href="https://api.whatsapp.com/send?phone=51{{ $ask->info_whatsapp }}&text=Saludos"
                                       target="_blank">51{{ $ask->info_whatsapp }}</a>
                                @endif
                            </td>
                            <td class="align-middle">{{ $ask->created_at }}</td>
                            <td class="align-middle">
                                <div class="w-15 w-sm-100">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                                data-toggle="tooltip"
                                                data-placement="top" wire:click.prevent="openModal({{ $ask->id }})"
                                                title="Ver"><i class="fas fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-toggle="tooltip"
                                                wire:click.prevent="deleteConfirm({{ $ask->id }})"
                                                data-placement="top" title="Eliminar"><i
                                                class="fas fa-times-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="wrap-pagination-info">
            {{ $asks->links('livewire.widgets.admin-pagination-link') }}
        </div>
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

