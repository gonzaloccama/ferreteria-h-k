<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];
        ?>

        @include('livewire.widgets.admin.title-page')

        <div class="separator mb-5"></div>
    </div>

    <div class="col-12">

        <div class="card mb-4">
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="selectCategories" class="col-sm-2 col-form-label">Elegir categorias</label>

                        <div class="col-md-10">
                            <select class="form-control select2-single" id="selectCategories"
                                    wire:model="selectCategories" multiple="multiple" data-width="100%">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numberOfProducts" class="col-sm-2 col-form-label">Numero de productos</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="numberOfProducts" placeholder="1"
                                   wire:model="numberOfProducts">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="updateHomeCategory">
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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

        $(document).ready(function () {
            initSelect2Multiple('#selectCategories', 'selectCategories');

            window.livewire.on('refresh', () => {
                initSelect2Multiple('#selectCategories', 'selectCategories');
            });


            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
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

        function initSelect2Multiple(sel, varModel) {
            if ($().select2) {
                $(sel).select2({
                    theme: "bootstrap",
                    // dir: direction,
                    placeholder: "Seleccione...",
                    maximumSelectionSize: 6,
                    containerCssClass: ":all:",
                    "language": {
                        "noResults": function () {
                            return "No se han encontrado resultados";
                        }
                    },
                });
                $(sel).on('change', function (e) {
                    @this.
                    set(varModel, $(this).val());
                });
            }
            function formatOption(option) {
                var $option = $(
                    '<strong>' + option.text + '</strong>'
                );
                return $option;
            }
        }
    </script>
@endpush
