<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false]; // button add
        $mode = 'list'; // icon list or box

        $actions = [ //static actions table
            'view' => 'Ver mensaje',
            'edit' => null,
            'go' => null,
            'delete' => 'Eliminar',
        ];

        //        $customs = [ // custom action table
        //            'txt' => 'Estado', //static
        //            'actions' => [ //editable
        //                'delivered' => 'updateOrderStatus',
        //                'completed' => 'updateOrderStatus',
        //                'canceled' => 'updateOrderStatus',
        //            ],
        //            'inputs' => [ //static
        //                'one' => 'id',
        //                'two' => 'status',
        //            ],
        //        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        <div class="separator mb-5"></div>
    </div>

    @include('livewire.admin.dashboard.index')
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/glide.core.min.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/js/vendor/glide.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/chartjs-plugin-datalabels.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg}!`, 'rgba(8,129,120,0.9)');
            });
        });

    </script>
@endpush

