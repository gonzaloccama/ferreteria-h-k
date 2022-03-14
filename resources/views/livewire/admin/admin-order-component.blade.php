<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];
        $mode = 'list';

        $actions = [
            'view' => 'Detalles',
            'edit' => null,
            'go' => null,
            'delete' => 'Eliminar',
        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    <div class="col-md-12 list">

        @include('livewire.widgets.admin.table-basic')

    </div>
</div>
