<div class="row">
    <div class="col-12">
        <div class="mb-3 title-page">
            <h1>{{ $_title }} @push('title') {{ $pageTitle }} @endpush</h1>
            <div class="text-zero top-right-button-container">
                <button type="button" class="btn btn-primary top-right-button" wire:click.prevent="openModal">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                    <span class="align-middle">HOME SLIDERS</span>
                </button>

            </div>
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
                            <a class="dropdown-item {{ $orderBy == 'title' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('title', '{{$sort}}')">Título</a>
                            <a class="dropdown-item {{ $orderBy == 'price' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('price', '{{$sort}}')">Precio</a>
                            <a class="dropdown-item {{ $orderBy == 'status' ? 'active':'' }}" href="#"
                               wire:click.prevent="updateOrderBy('status', '{{$sort}}')">Estado</a>
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

    @if($modeUpdate == 'create')
        @include('livewire.admin.homeSlider.create')
    @elseif($modeUpdate == 'update')
        @include('livewire.admin.homeSlider.update')
    @endif

    <div class="col-md-12 list">


        @foreach($sliders as $slider)
            <div class="card d-flex flex-row mb-3">
                <a class="d-flex" href="Pages.Product.Detail.html">
                    <img src="{{ asset('assets/images/sliders/').'/'.$slider->image }}" alt="{!! $slider->title !!}"
                         class="list-thumbnail responsive border-0 card-img-left"/>
                </a>
                <div class="pl-0 d-flex flex-grow-1 min-width-zero">
                    <div
                        class="card-body align-self-center d-flex flex-column flex-lg-row min-width-zero align-items-lg-center">
                        <a href="Pages.Product.Detail.html" class="w-25 w-sm-100 ml-0 mr-0 pl-0 pr-0">
                            <p class="list-item-heading mb-0 truncate">{!! $slider->title !!}</p>
                        </a>

                        <p class="mb-0 text-muted text-small w-40 w-sm-100">{!! $slider->subtitle !!}</p>
                        <div class="mb-0 text-small w-10 w-sm-100">
                            <span class="font-weight">S/ {!! $slider->price !!}</span>
                        </div>
                        <div class="mb-0 text-muted text-small w-10 w-sm-100">
                            <span class="badge badge-outline-{{ $slider->status?'success':'danger' }}">
                                {!! $slider->status?'Activo':'Inactivo' !!}
                            </span>
                        </div>
                        <div class="w-15 w-sm-100">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Ver"><i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="edit({{ $slider->id }})"
                                        data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="deleteConfirm({{ $slider->id }})"
                                        data-placement="top" title="Eliminar"><i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="wrap-pagination-info">
            {{ $sliders->links('livewire.widgets.admin-pagination-link') }}
        </div>
    </div>
</div>

@push('styles')
    {{--    <link rel="stylesheet" href="{{ asset('assets/plugins/table/style.css') }}"/>--}}
@endpush

@push('scripts')
    {{--    <script src="{{ asset('assets/plugins/table/script.js') }}"></script>--}}
    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>

    <script type="text/javascript">

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshF', function () {

            let tooltip_ = $('[data-toggle="tooltip"]');

            tooltip_.tooltip('dispose');
            tooltip_.tooltip('hide');
            tooltip_.tooltip();
        });

        //  init add events scripts
        @this.on('showModalAdd', function () {
            $('#addModal').modal('show')
            loadTinyMce('textarea.title', 'title');
            loadTinyMce('textarea.subtitle', 'subtitle');
        })

        @this.on('addAlert', function () {
            notificationSwal('¡Home Slider se ha agregado correctamente!');
        });

        //  end add events scripts

        //    init edit events scripts
        @this.on('showModalEdit', function () {
            $('#editModal').modal('show');
            loadTinyMce('textarea.title', 'title');
            loadTinyMce('textarea.subtitle', 'subtitle');
        });

        @this.on('editAlert', function () {
            notificationSwal('¡Home Slider actualizada exitosamente!', 'success');
        });
        //    end edit events scripts

        @this.on('closeModal', function () {
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

        function loadTinyMce(sel, varModel) {
            tinymce.init({
                selector: sel,
                skin: "oxide-dark",
                content_css: "dark",
                // height: (window.innerHeight - 480),
                forced_root_block: false,
                setup: function (editor) {
                    editor.on('init change', function () {
                        // editor.setContent(value);
                        editor.save();
                    });
                    editor.on('change', function (e) {
                    @this.set(varModel, editor.getContent());
                    });
                },
            });
        }

        function loadTinyMce(sel, varModel) {
            tinymce.init({
                selector: sel,
                skin: "oxide-dark",
                content_css: "dark",
                // height: (window.innerHeight - 480),
                forced_root_block: false,
                setup: function (editor) {
                    editor.on('init change', function () {
                        // editor.setContent(value);
                        editor.save();
                    });
                    editor.on('change', function (e) {
                    @this.set(varModel, editor.getContent());
                    });
                },
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
