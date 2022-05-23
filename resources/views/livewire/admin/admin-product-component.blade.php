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
                         style="text-transform: uppercase; font-weight: bold; height: 60px">
                        <h6>{{ $product->name }}</h6>
                    </div>
                    <hr class="p-0 m-0 mb-2" style="background-color: #4f4f4f !important;">
                    <div class="card-body mt-0 pt-0 mb-2 pb-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <abbr title="{{ $product->stock_status }}" class="weight-700">STOCK:</abbr>
                                    <p class="badge p-0 m-0 rajdhani font-15 weight-400">
                                        {{ $product->stock_status }}
                                        <u class="weight-700">({{ $product->quantity }})</u>
                                    </p>
                                </div>

                                <div class="mb-1 pt-1">
                                    <abbr title="{{ $product->regular_price }}" class="weight-700">PRECIO:</abbr>
                                    <p class="badge p-0 m-0 rajdhani font-15 weight-400">
                                        S/ {{ number_format($product->regular_price, 2, '.', ',') }}
                                    </p>
                                </div>

                                <div class="mb-1 pt-1">
                                    <abbr title="{{ $product->sale_price?'S/ '.$product->sale_price:'' }}"
                                          class="weight-700">DESCUENTO:</abbr>
                                    <p class="badge p-0 m-0 rajdhani font-15 weight-400 text-primary">
                                        {{ $product->sale_price?'S/ '.number_format($product->sale_price, 2, '.', ','):'' }}
                                    </p>
                                </div>

                                <div class="mb-1 pt-1">
                                    <abbr title="{{ $product->SKU }}"
                                          class="weight-700">SKU:</abbr>
                                    <p class="badge p-0 m-0 rajdhani font-15 weight-400">
                                        {{ $product->SKU }}
                                    </p>
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
    <script src="{{ asset('assets/plugins/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor5/translations/es.js') }}"></script>
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

                activeSelect2('#category_id', 'category_id');
                activeSelect2('#stock_status', 'stock_status');
                activeSelect2('#featured', 'featured');
            });

            window.livewire.on('showModal', () => {
                $('#showModal').modal('show');
                activeSelect2('.category_id', 'category_id');

                activeCkeditor('#short_description', 'short_description');
                activeCkeditor('#description', 'description');
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
            $(sel).select2({
                theme: "bootstrap",
                // dir: direction,
                placeholder: "Seleccione...",
                maximumSelectionSize: 6,
                containerCssClass: ":all:",
                templateResult: formatOption,
            });
            $(sel).on('change', function (e) {
                @this.
                set(varModel, e.target.value);
            });

            function formatOption(option) {
                var $option = $(
                    '<strong>' + option.text + '</strong>'
                );
                return $option;
            }
        }

        function activeCkeditor(sel, varModel) {
            if (typeof ClassicEditor !== "undefined") {
                ClassicEditor
                    .create(document.querySelector(sel), {
                        // The language code is defined in the https://en.wikipedia.org/wiki/ISO_639-1 standard.
                        language: 'es',
                    })
                    .then(editor => {
                        // editor.setData('');
                        editor.model.document.on('change:data', () => {
                            @this.
                            set(varModel, editor.getData());
                        });
                    })
                    .catch(function (error) {
                    });
            }
        }

        {{--function loadTinyMce(sel, varModel) {--}}
        {{--    tinymce.init({--}}
        {{--        selector: sel,--}}
        {{--        skin: "oxide-dark",--}}
        {{--        content_css: "dark",--}}
        {{--        // height: (window.innerHeight - 480),--}}
        {{--        forced_root_block: false,--}}
        {{--        setup: function (editor) {--}}
        {{--            editor.on('init change', function () {--}}
        {{--                // editor.setContent(value);--}}
        {{--                editor.save();--}}
        {{--            });--}}
        {{--            editor.on('change', function (e) {--}}
        {{--                @this.--}}
        {{--                set(varModel, editor.getContent());--}}
        {{--            });--}}
        {{--        },--}}
        {{--    });--}}
        {{--}--}}

    </script>
@endpush
