<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false]; // button add
        $mode = 'list'; // icon list or box

        $actions = [ //static actions table
            'view' => 'Detalles',
            'edit' => null,
            'go' => null,
            'delete' => 'Eliminar',
        ];

        $customs = [ // custom action table
            'txt' => 'Estado', //static
            'actions' => [ //editable
                'delivered' => 'updateOrderStatus',
                'completed' => 'updateOrderStatus',
                'canceled' => 'updateOrderStatus',
            ],
            'inputs' => [ //static
                'one' => 'id',
                'two' => 'status',
            ],
        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    <div class="col-md-12 list">
        @include('livewire.widgets.admin.table-basic')
    </div>

    @if($frame)
        @include('livewire.admin.Order.'.$frame)
    @endif
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>
@endpush

@push('scripts')
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('refresh', () => {
                activeSelect2('#tStatus', 'tStatus');
            });

            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });

            window.livewire.on('showModal', () => {
                $('#viewModal').modal('show');
            });

            window.livewire.on('closeModal', () => {
                $('#viewModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
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
    </script>
@endpush
