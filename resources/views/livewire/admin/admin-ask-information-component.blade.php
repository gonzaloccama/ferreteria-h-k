<div class="row">
    <div class="col-12">
        <div class="mb-3 title-page">
            <h1>{{ $_title }} @push('title') {{ $pageTitle }} @endpush</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Library</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

        </div>

        <div class="mb-2">
            <a class="btn pt-0 pl-0 d-inline-block d-md-none" data-toggle="collapse" href="#displayOptions"
               role="button" aria-expanded="true" aria-controls="displayOptions">
                Opciones de pantalla
                <i class="simple-icon-arrow-down align-middle"></i>
            </a>
            <div class="collapse d-md-block" id="displayOptions">
                            <span class="mr-3 mb-2 d-inline-block float-md-left">

                                <a href="javascript:;" class="mr-2 view-icon active">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                                        <path class="view-icon-svg" d="M17.5,3H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"/>
                                        <path class="view-icon-svg"
                                              d="M3,2V3H1V2H3m.12-1H.88A.87.87,0,0,0,0,1.88V3.12A.87.87,0,0,0,.88,4H3.12A.87.87,0,0,0,4,3.12V1.88A.87.87,0,0,0,3.12,1Z"/>
                                        <path class="view-icon-svg"
                                              d="M3,9v1H1V9H3m.12-1H.88A.87.87,0,0,0,0,8.88v1.24A.87.87,0,0,0,.88,11H3.12A.87.87,0,0,0,4,10.12V8.88A.87.87,0,0,0,3.12,8Z"/>
                                        <path class="view-icon-svg"
                                              d="M3,16v1H1V16H3m.12-1H.88a.87.87,0,0,0-.88.88v1.24A.87.87,0,0,0,.88,18H3.12A.87.87,0,0,0,4,17.12V15.88A.87.87,0,0,0,3.12,15Z"/>
                                        <path class="view-icon-svg"
                                              d="M17.5,10H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"/>
                                        <path class="view-icon-svg"
                                              d="M17.5,17H6.5a.5.5,0,0,1,0-1h11a.5.5,0,0,1,0,1Z"/></svg>
                                </a>

                            </span>
                <div class="d-block d-md-inline-block">
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ordenar
                        </button>
                        <div class="dropdown-menu">

                            <a class="dropdown-item {{ $orderBy == 'id' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('id', '{{$sort}}')">ID</a>

                            <a class="dropdown-item {{ $orderBy == 'info_names' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('info_names', '{{$sort}}')">Nombre</a>
                            <a class="dropdown-item {{ $orderBy == 'info_email' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('info_email', '{{$sort}}')">Correo</a>
                            <a class="dropdown-item {{ $orderBy == 'info_celular' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('info_celular', '{{$sort}}')">Celular</a>

                            <a class="dropdown-item {{ $orderBy == 'created_at' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('created_at', '{{$sort}}')">Fecha de creación</a>
                        </div>
                    </div>
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orden
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ $sort == 'ASC' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('{{ $orderBy }}','ASC')">Ascendente</a>
                            <a class="dropdown-item {{ $sort == 'DESC' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('{{ $orderBy }}','DESC')">Descendente</a>
                        </div>
                    </div>
                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                        <input placeholder="Buscar..." wire:model="keyWord">
                    </div>
                </div>
                <div class="float-md-right">
                    <span class="text-muted text-small">Mostrar </span>
                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $limit }}
                    </button>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item {{ $limit == 3 ? 'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(3)">3</a>
                        <a class="dropdown-item {{ $limit == 5 ? 'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(5)">5</a>
                        <a class="dropdown-item {{ $limit == 10 ? 'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(10)">10</a>
                        <a class="dropdown-item {{ $limit == 20 ? 'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(20)">20</a>
                        <a class="dropdown-item {{ $limit == 50 ? 'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(50)">50</a>
                    </div>
                </div>
            </div>
        </div>
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

