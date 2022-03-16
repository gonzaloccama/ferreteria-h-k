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
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('alertSave', (mssg) => {
                notificationSwal(`¡${mssg}!`, 'rgba(8,129,120,0.9)');
            });

            window.livewire.on('showModalView', () => {
                $('#viewModal').modal('show');
            });

            window.livewire.on('closeModalView', () => {
                $('#viewModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });
        });




    </script>
@endpush
