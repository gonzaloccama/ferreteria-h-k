<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => false];

        $items = [
            'id' => 'ID',
            'name' => 'Nombre',
            'website' => 'Sitio Web',
            'status' => 'Estado',
            'created_at' => 'Fecha de Creación',
        ];
        $mode = 'list';
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    <div class="col-md-12 list">


        @foreach($orders as $order)

        @endforeach

        <div class="wrap-pagination-info">
{{--            {{ $brands->links('livewire.widgets.admin-pagination-link') }}--}}
        </div>
    </div>
</div>
