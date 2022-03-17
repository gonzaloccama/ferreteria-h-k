<div>
    <?php
    $up_page = ['page' => 'User', 'route' => route('user.dashboard')];
    ?>

    @include('livewire.widgets.breadcrumb')
    <section class="">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-10 mt-40 mb-40">
                    <?php
                    $actions = [
                        'view' => 'Detalles',
                        'edit' => null,
                        'go' => null,
                        'delete' => null,
                        'canceled' => 'Cancelar',
                    ];
                    ?>
                    <div class="col-md-12 list">
                        <h4 class="mt-10 mb-10 text-uppercase" style="font-weight: 200;">{{ $title }}</h4>
                        @if($frame)
                            @include('livewire.user.user-order-component.'.$frame)
                        @else
                            @include('livewire.widgets.user.more-options')
                            @include('livewire.widgets.user.table-basic')
                        @endif
                    </div>
                </div>
                <div class="col-lg-2 primary-sidebar sticky-sidebar">
                    @include('livewire.user.layout.sidebar')
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('cancelAlert', (mssg) => {
                notificationSwal(`¡${mssg}!`, 'rgba(8,129,120,0.9)');
            });
        });


    </script>
@endpush
