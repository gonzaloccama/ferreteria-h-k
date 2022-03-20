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

    @if($modeUpdate == 'view')
        @include('livewire.admin.askInformation.view')
    @endif

    <div class="col-md-12 list">
        @include('livewire.widgets.admin.table-basic')
    </div>
</div>

@push('styles')

@endpush

@push('scripts')

    <script type="text/javascript">

        document.addEventListener('livewire:load', function (event) {
        @this.on('refreshF', function () {

            let tooltip_ = $('[data-toggle="tooltip"]');

            tooltip_.tooltip('dispose');
            tooltip_.tooltip('hide');
            tooltip_.tooltip();
        });


        @this.on('showModalView', function () {
            $('#viewModal').modal('show')
        })

        @this.on('closeModalView', function () {
            $('#viewModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop.fade.show').remove();
        });

        @this.on('cleanError', function () {
            $('.error.text-danger').html('');
        });

        @this.on('deleteAlert', function () {
            deleteSwal();
        });
        });


    </script>

@endpush

