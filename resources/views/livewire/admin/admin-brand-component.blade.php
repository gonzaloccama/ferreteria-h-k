<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => true];

        $items = [
            'id' => 'ID',
            'name' => 'Nombre',
            'website' => 'Sitio Web',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
        ];
        $mode = 'list';
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    @if($modeUpdate == 'create')
        @include('livewire.admin.brand.create')
    @elseif($modeUpdate == 'update')
        @include('livewire.admin.brand.update')
    @endif

    <div class="col-md-12 list">


        @foreach($brands as $brand)
            <div class="card d-flex flex-row mb-3">
                <a class="d-flex" href="Pages.Product.Detail.html">
                    <img src="{{ asset('assets/images/brands/').'/'.$brand->image }}" alt="{!! $brand->title !!}"
                         class="list-thumbnail responsive border-0 card-img-left"/>
                </a>
                <div class="pl-0 d-flex flex-grow-1 min-width-zero">
                    <div
                        class="card-body align-self-center d-flex flex-column flex-lg-row min-width-zero align-items-lg-center">
                        <a href="Pages.Product.Detail.html" class="w-25 w-sm-100 ml-0 mr-0 pl-0 pr-0">
                            <p class="list-item-heading mb-0 truncate">{!! $brand->name !!}</p>
                        </a>

                        <p class="mb-0 text-muted text-small w-40 w-sm-100">{!! $brand->website !!}</p>

                        <div class="mb-0 text-muted text-small w-10 w-sm-100">
                            <span class="badge badge-outline-{{ $brand->status?'success':'danger' }}">
                                {!! $brand->status?'Activo':'Inactivo' !!}
                            </span>
                        </div>
                        <div class="w-15 w-sm-100">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        data-placement="top" title="Ver"><i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="edit({{ $brand->id }})"
                                        data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                        wire:click.prevent="deleteConfirm({{ $brand->id }})"
                                        data-placement="top" title="Eliminar"><i class="fas fa-times-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

        <div class="wrap-pagination-info">
            {{ $brands->links('livewire.widgets.admin-pagination-link') }}
        </div>
    </div>
</div>

@push('styles')
    {{--    <link rel="stylesheet" href="{{ asset('assets/plugins/table/style.css') }}"/>--}}
@endpush

@push('scripts')
    {{--    <script src="{{ asset('assets/plugins/table/script.js') }}"></script>--}}
    {{--    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>--}}

    <script type="text/javascript">

        document.addEventListener('livewire:load', function (event) {
            @this.
            on('refreshF', function () {

                let tooltip_ = $('[data-toggle="tooltip"]');

                tooltip_.tooltip('dispose');
                tooltip_.tooltip('hide');
                tooltip_.tooltip();
            });

            //  init add events scripts
            @this.
            on('showModalAdd', function () {
                $('#addModal').modal('show')
                // loadTinyMce('textarea.title', 'title');
                // loadTinyMce('textarea.subtitle', 'subtitle');
            })

            @this.on('addAlert', function () {
                notificationSwal('¡Home Slider se ha agregado correctamente!');
            });

            //  end add events scripts

            //    init edit events scripts
            @this.
            on('showModalEdit', function () {
                $('#editModal').modal('show');
                // loadTinyMce('textarea.title', 'title');
                // loadTinyMce('textarea.subtitle', 'subtitle');
            });

            @this.
            on('editAlert', function () {
                notificationSwal('¡Home Slider actualizada exitosamente!', 'success');
            });
            //    end edit events scripts

            @this.
            on('closeModal', function () {
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            @this.
            on('cleanError', function () {
                $('.error.text-danger').html('');
            });

            @this.
            on('deleteAlert', function () {
                deleteSwal();
            });
        });

        // function loadTinyMce(sel, varModel) {
        //     tinymce.init({
        //         selector: sel,
        //         skin: "oxide-dark",
        //         content_css: "dark",
        //         // height: (window.innerHeight - 480),
        //         forced_root_block: false,
        //         setup: function (editor) {
        //             editor.on('init change', function () {
        //                 // editor.setContent(value);
        //                 editor.save();
        //             });
        //             editor.on('change', function (e) {
        //             @this.set(varModel, editor.getContent());
        //             });
        //         },
        //     });
        // }


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
