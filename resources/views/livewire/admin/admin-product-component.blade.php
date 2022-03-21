<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => true];

        $mode = 'square';
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    @if($frame)
        @include('livewire.admin.product.' . $frame);
    @endif

    <div class="col-md-12 row list disable-text-selection" data-check-all="checkAll">
        @foreach($products as $product)
            <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4">
                <div class="card">
                    <div class="position-relative">
                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
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

        $(document).ready(function () {

            window.livewire.on('refresh', () => {
                activeSelect2('#parent', 'parent');

                let tooltip_ = $('[data-toggle="tooltip"]');

                tooltip_.tooltip('dispose');
                tooltip_.tooltip('hide');
                tooltip_.tooltip();

                activeSelect2('.category_id', 'category_id');
            });

            window.livewire.on('showModal', () => {
                $('#showModal').modal('show');
                activeSelect2('.category_id', 'category_id');

                loadTinyMce('textarea.short_description', 'short_description');
                loadTinyMce('textarea.description', 'description');
            });

            window.livewire.on('closeModal', () => {
                $('#showModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });
        });

        function activeSelect2(sel, varModel) {
            $(sel).select2();
            $(sel).on('change', function (e) {
                @this.
                set(varModel, e.target.value);
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
                        @this.
                        set(varModel, editor.getContent());
                    });
                },
            });
        }

    </script>
@endpush
