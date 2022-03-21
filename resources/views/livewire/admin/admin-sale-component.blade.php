<div class="row">
    <div class="col-12">
        <?php
        $buttons = ['is_add' => false];
        ?>

        @include('livewire.widgets.admin.title-page')

        <div class="separator mb-5"></div>
    </div>

    <div class="col-12">

        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="selectCategories" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-md-10">
                            <select class="form-control status"
                                    wire:model="status" data-width="100%">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="numberOfProducts" class="col-sm-2 col-form-label">Dias de venta</label>
                        <div class="col-sm-10">
                            <input type="text" id="sale-date" class="form-control flatpickr"
                                   placeholder="YYYY/MM/DD H:M:S" wire:model="sale_date">
                        </div>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary mb-0" wire:click.prevent="updateSale">
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
    <link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/es.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            $(".flatpickr").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                disableMobile: "true",
                "locale": "es"
            });

            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });
        });


    </script>
@endpush
