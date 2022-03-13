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

{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>--}}
{{--@endpush--}}

{{--@push('scripts')--}}
{{--    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>--}}
{{--    <script type="text/javascript">--}}

{{--        $(document).ready(function () {--}}
{{--            activeSelect2('.categories', 'selectCategories');--}}

{{--            window.livewire.on('refreshDropdown', () => {--}}
{{--                activeSelect2('.categories', 'selectCategories');--}}
{{--            });--}}

{{--            window.livewire.on('alertSuccess', () => {--}}
{{--                notificationSwal('¡Home Category se ha actualizado exitosamente!');--}}
{{--            });--}}
{{--        });--}}

{{--        function activeSelect2(sel, varModel) {--}}
{{--            $(sel).select2();--}}
{{--            $(sel).on('change', function (e) {--}}
{{--                let data = $(this).val();--}}
{{--            @this.set(varModel, data);--}}
{{--            });--}}
{{--        }--}}

{{--        function notificationSwal(mssg, stl) {--}}
{{--            const Toast = Swal.mixin({--}}
{{--                toast: true,--}}
{{--                position: 'top-end',--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 3000,--}}
{{--                timerProgressBar: true,--}}
{{--                didOpen: (toast) => {--}}
{{--                    toast.addEventListener('mouseenter', Swal.stopTimer)--}}
{{--                    toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
{{--                }--}}
{{--            })--}}
{{--            Toast.fire({--}}
{{--                icon: stl,--}}
{{--                title: mssg--}}
{{--            })--}}
{{--        }--}}

{{--    </script>--}}
{{--@endpush--}}


{{--<div>--}}
{{--    <div class="container" style="padding: 30px 0;">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <panel class="panel-default">--}}
{{--                    <div class="panel-heading">--}}
{{--                        SALE SETTING--}}
{{--                    </div>--}}
{{--                    <div class="panel-body">--}}
{{--                        @if(Session::has('message'))--}}
{{--                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>--}}
{{--                        @endif--}}
{{--                        <form class="form-horizontal" wire:submit.prevent="updateSale">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="" class="col-md-4 control-label">status</label>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <select name="" id="" class="form-control" wire:model="status">--}}
{{--                                        <option value="0">Inactive</option>--}}
{{--                                        <option value="1">Active</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="sale-date" class="col-md-4 control-label">Sale date</label>--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <input type="text" id="sale-date" class="form-control input-md"--}}
{{--                                           placeholder="YYYY/MM/DD H:M:S" wire:model="sale_date">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group text-center">--}}
{{--                                <input type="submit" id="sale-date" class="btn btn-primary" value="Guardar">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </panel>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

@push('styles')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"--}}
{{--          integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ=="--}}
{{--          crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}

{{--    <link rel="stylesheet"--}}
{{--          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"--}}
{{--          integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="--}}
{{--          crossorigin="anonymous" referrerpolicy="no-referrer"/>--}}

    {{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap-datepicker3.min.css') }}"/>--}}
    {{--    <script src="{{ asset('assets/admin/js/vendor/bootstrap-datepicker.js') }}"></script>--}}
<link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/flatpickr.css') }}">
{{--<link rel="stylesheet" href="{{ asset('assets/plugins/flatpickr/custom-flatpickr.css') }}">--}}
@endpush

@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"--}}
{{--            integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"--}}
{{--            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="--}}
{{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--    <script--}}
{{--        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"--}}
{{--        integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg=="--}}
{{--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>--}}

    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/plugins/flatpickr/es.js') }}"></script>
{{--    <script src="{{ asset('assets/plugins/flatpickr/custom-flatpickr.js') }}"></script>--}}

    <script type="text/javascript">
        $(document).ready(function () {
            // $('#sale-date').datetimepicker({
            //     format: 'YYYY-MM-DD h:m:s',
            //     icons: {
            //         time: "fas fa-clock-o",
            //         date: "fas fa-calendar",
            //         up: "fas fa-caret-up",
            //         down: "fas fa-caret-down",
            //         previous: "fas fa-caret-left",
            //         next: "fas fa-caret-right",
            //         today: "fas fa-today",
            //         clear: "fas fa-clear",
            //         close: "fas fa-close"
            //     },
            // }).on('dp.change', function (e) {
            //     var data = $('#sale-date').val();
            // @this.set('sale_date', data);
            // });

            $(".flatpickr").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                disableMobile: "true",
                "locale": "es"
            });

            window.livewire.on('alertSuccess', () => {
                notificationSwal('¡Fecha de ventas se ha actualizado exitosamente!');
            });
        });

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

    </script>
@endpush
