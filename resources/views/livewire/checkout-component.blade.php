<main class="main">
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];
    ?>
    @include('livewire.widgets.breadcrumb')
    <section class="mt-50 mb-50">
        <div class="container">
            @if(Session::has('stripe_error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close " data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    <strong>Mensaje:</strong>  {{ Session::get('stripe_error') }}
                </div>
            @endif

            @if($frame)
                @include('livewire.frontend.checkout-component.login-and-code')
                <div class="row">
                    <div class="col-12">
                        <div class="divider mt-50 mb-50"></div>
                    </div>
                </div>
                <div class="row">

                    @include('livewire.frontend.checkout-component.billing')
                    @include('livewire.frontend.checkout-component.order')

                </div>
            @else
                @include('livewire.frontend.checkout-component.thanks')
            @endif
        </div>
    </section>
</main>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('alertSave', (mssg) => {
                notificationSwal(`¡Se envió correctamente <b class="fst-italic"> ${mssg} </b>!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('freshComponent', () => {
                activeSelect2('#region', 'region', 'Departamento');
                activeSelect2('#province', 'province', 'Provincia');
                activeSelect2('#s_region', 's_region', 'Departamento');
                activeSelect2('#s_province', 's_province', 'Provincia');
            });

            window.livewire.on('deleteCart', () => {
                notificationSwal(`¡Se eliminó extosamente del <b class="fst-italic">Carrito de compras</b>!`, 'rgba(224,0,33,0.79)');
            });

            activeSelect2('#region', 'region', 'Departamento');
            activeSelect2('#province', 'province', 'Provincia');
            activeSelect2('#s_region', 's_region', 'Departamento');
            activeSelect2('#s_province', 's_province', 'Provincia');
        });

        function activeSelect2(sel, varModel, txt = null) {
            $(sel).select2({
                placeholder: (txt ? txt : varModel) + '...',
                width: '100%'
            });
            $(sel).on('change', function (e) {
                @this.
                set(varModel, e.target.value);
            });
        }
    </script>
@endpush
