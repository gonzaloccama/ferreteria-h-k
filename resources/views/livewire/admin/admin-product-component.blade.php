<div class="row">
    <div class="col-md-12">

        <div class="mb-3 title-page">
            <h1>{{ $title }}</h1>@push('title'){{ $pageTitle }}@endpush
            <div class="text-zero top-right-button-container">
                <button type="button" class="btn btn-primary top-right-button" wire:click.prevent="openModal">
                    {{--                    data-toggle="modal"--}}
                    {{--                    data-target="#addModal"--}}
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                         stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line>
                    </svg>
                    PRODUCTO
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
                Mostrar opciones
                <i class="simple-icon-arrow-down align-middle"></i>
            </a>
            <div class="collapse d-md-block" id="displayOptions">
                <span class="mr-3 mb-2 d-inline-block float-md-left">
                    <a href="#" class="mr-2 view-icon active">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
                            <path class="view-icon-svg"
                                  d="M7,2V8H1V2H7m.12-1H.88A.87.87,0,0,0,0,1.88V8.12A.87.87,0,0,0,.88,9H7.12A.87.87,0,0,0,8,8.12V1.88A.87.87,0,0,0,7.12,1Z"/>
                            <path class="view-icon-svg"
                                  d="M17,2V8H11V2h6m.12-1H10.88a.87.87,0,0,0-.88.88V8.12a.87.87,0,0,0,.88.88h6.24A.87.87,0,0,0,18,8.12V1.88A.87.87,0,0,0,17.12,1Z"/>
                            <path class="view-icon-svg"
                                  d="M7,12v6H1V12H7m.12-1H.88a.87.87,0,0,0-.88.88v6.24A.87.87,0,0,0,.88,19H7.12A.87.87,0,0,0,8,18.12V11.88A.87.87,0,0,0,7.12,11Z"/>
                            <path class="view-icon-svg"
                                  d="M17,12v6H11V12h6m.12-1H10.88a.87.87,0,0,0-.88.88v6.24a.87.87,0,0,0,.88.88h6.24a.87.87,0,0,0,.88-.88V11.88a.87.87,0,0,0-.88-.88Z"/>
                        </svg>
                    </a>
                </span>
                <div class="d-block d-md-inline-block">
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ordenar
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ $orderBy==='id'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('id','{{ $sort }}')" href="#">ID</a>
                            <a class="dropdown-item {{ $orderBy==='name'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('name','{{ $sort }}')" href="#">Nombre</a>
                            <a class="dropdown-item {{ $orderBy==='regular_price'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('regular_price','{{ $sort }}')" href="#">Precio
                                Regular</a>
                            <a class="dropdown-item {{ $orderBy==='sale_price'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('sale_price','{{ $sort }}')" href="#">Precio Venta</a>
                            <a class="dropdown-item {{ $orderBy==='stock_status'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('stock_status','{{ $sort }}')" href="#">Estado</a>
                            <a class="dropdown-item {{ $orderBy==='created_at'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('created_at','{{ $sort }}')" href="#">Fecha de
                                Creación</a>
                        </div>
                    </div>
                    <div class="btn-group float-md-left mr-1 mb-1">
                        <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Orden
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ $sort==='ASC'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('{{ $orderBy }}','ASC')" href="#">Ascendente</a>
                            <a class="dropdown-item {{ $sort==='DESC'?'active':'' }}"
                               wire:click.prevent="updateOrderBy('{{ $orderBy }}','DESC')" href="#">Descendente</a>
                        </div>
                    </div>
                    <div class="search-sm d-inline-block float-md-left mr-1 mb-1 align-top">
                        <input placeholder="Buscar..." wire:model="keyWord">
                    </div>
                </div>

                <div class="float-md-right">
                    <span class="text-muted text-small">Mostrar  </span>
                    <button class="btn btn-outline-dark btn-xs dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $limit }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item {{ $limit === 4?'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(4)">4</a>
                        <a class="dropdown-item {{ $limit === 8?'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(8)">8</a>
                        <a class="dropdown-item {{ $limit === 16?'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(16)">16</a>
                        <a class="dropdown-item {{ $limit === 32?'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(32)">32</a>
                        <a class="dropdown-item {{ $limit === 64?'active':'' }}" href="#"
                           wire:click.prevent="updatePagination(64)">64</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator mb-5"></div>
    </div>

    @if($modeUpdate == 'create')
        @include('livewire.admin.product.create');
    @elseif($modeUpdate == 'update')
        @include('livewire.admin.product.update');
    @endif

    <div class="col-md-12 row list disable-text-selection" data-check-all="checkAll">
        @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <a href="Pages.Product.Detail.html">
                            <img class="card-img-top" src="{{ asset('assets/images/products/').'/'.$product->image }}"
                                 alt="Card image cap">
                        </a>
                        <span class="badge badge-pill badge-danger position-absolute badge-top-left"
                              style="text-transform: uppercase;">{{ $product->category->name }}</span>
                        <span
                            class="badge badge-pill badge-secondary position-absolute badge-top-left-2">{{ $product->created_at }}</span>
                    </div>
                    <div class="card-header mt-2 pt-2 text-center"
                         style="text-transform: uppercase; font-weight: bold;">
                        <h6>{{ $product->name }}</h6>
                    </div>
                    <div class="card-body mt-0 pt-0 mb-2 pb-2">
                        <div class="row">
                            <div class="col-12">
                                {{--                                <hr class="m-1 p-1">--}}
                                <div class="mb-1"><b>STOCK:</b>
                                    <span
                                        class="badge badge-pill badge-outline-{{ $product->stock_status==='instock'?'success':'danger' }}">
                                        {{ $product->stock_status }}
                                    </span>
                                </div>

                                <div class="text-muted mb-1 pt-1"><b>PRECIO:</b>
                                    <span
                                        class="badge badge-pill badge-outline-primary">S/ {{ $product->regular_price }}
                                    </span>
                                </div>

                                <div class="text-muted mb-1 pt-1"><b>PRECIO:</b>
                                    <span class="{{ $product->sale_price?'badge badge-pill badge-outline-danger':'' }}">
                                        {{ $product->sale_price?'S/ '.$product->sale_price:'' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                    data-placement="top" title="Ver"><i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                    wire:click.prevent="edit('{{ $product->id }}')"
                                    data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i>
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                    wire:click.prevent="deleteConfirm('{{ $product->id }}')"
                                    data-placement="top" title="Eliminar"><i class="fas fa-times-circle"></i>
                            </button>
                        </div>
                    </div>
{{--                    <div class="card-footer text-center">--}}
{{--                        <a href="javascript:;" wire:click.prevent="edit('{{ $product->id }}')" class="text-primary"--}}
{{--                           data-toggle="tooltip"--}}
{{--                           data-placement="top" title="Editar"> <i class="iconsminds-pen fa-2x"></i>--}}
{{--                        </a>--}}
{{--                        <a href="javascript:;" wire:click.prevent="deleteConfirm('{{ $product->id }}')"--}}
{{--                           class="text-danger" data-toggle="tooltip"--}}
{{--                           data-placement="top" title="Eliminar"> <i class="iconsminds-close fa-2x"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        @endforeach

    </div>
    <div class="col-md-12">
        {{ $products->links('livewire.widgets.admin-pagination-link') }}
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/jquery.contextMenu.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>

    <style>
        .table {
            border-collapse: separate;
            border-spacing: 0 1px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>
    {{--    <script src="https://cdn.tiny.cloud/1/5wluuwcotje5s8xdln9xow6hslx4jcmygiorj4w3smgsuamd/tinymce/5/tinymce.min.js"--}}
    {{--            referrerpolicy="origin"></script>--}}


    <script type="text/javascript">
        // var category_id = $('.category_id');
        // $(document).ready(function () {
        //
        //     // loadTinyMce('textarea.short_description', 'short_description');
        //     // loadTinyMce('textarea.description', 'description');
        // });

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshF', function () {

            let tooltip_ = $('[data-toggle="tooltip"]');

            tooltip_.tooltip('dispose');
            tooltip_.tooltip('hide');
            tooltip_.tooltip();

            // $('.category_id').select2();

            activeSelect2('.category_id', 'category_id');

            // category_id.select2('destroy');
            // category_id.select2();

            // category_id.select2('destroy');
            // category_id.removeClass('select2-single');
            // category_id.addClass('select2-single');
            // category_id.select2();
        });

        @this.on('showModalEdit', function () {
            $('#editModal').modal('show');

            // $('.category_id').select2('destroy');
            // category_id.select2();
            activeSelect2('.category_id', 'category_id');

            loadTinyMce('textarea.short_description', 'short_description');
            loadTinyMce('textarea.description', 'description');
        });

        @this.on('showModalAdd', function () {
            $('#addModal').modal('show');

            // category_id.select2('destroy');


            loadTinyMce('textarea.short_description', 'short_description');
            loadTinyMce('textarea.description', 'description');
        });

        @this.on('addAlert', function () {
            notificationSwal('¡Producto agregada correctamente!');
        });

        @this.on('editAlert', function () {
            notificationSwal('¡Producto actualizada exitosamente!', 'success');
        });

        @this.on('deleteAlert', function () {
            deleteSwal();
        });

        @this.on('cleanError', function () {
            $('.error.text-danger').html('');
            // $('#formAdd')[0].reset();
            // tinymce.activeEditor.setContent('').repeat(2);
        });

        @this.on('closeModalUpdate', function () {
            // $('#editModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop.fade.show').remove();
        });

        @this.on('deleteAlert', function () {
            deleteSwal();
        });

        @this.on('closeModal', function () {
            // $('#addModal').modal('hide');
            // $('#formAdd')[0].reset();
            $('body').removeClass('modal-open');
            $('.modal-backdrop.fade.show').remove();
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

        function activeSelect2(sel, varModel) {
            $(sel).select2();
            $(sel).on('change', function (e) {
            @this.set(varModel, e.target.value);
            });
        }
    </script>
@endpush
