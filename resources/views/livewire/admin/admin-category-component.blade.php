<div class="row">
    <div class="col-md-12">
        <?php
        $buttons = ['is_add' => true];
        $mode = 'list';

        $actions = [
            'view' => null,
            'edit' => 'Editar',
            'go' => null,
            'delete' => 'Eliminar',
        ];
        ?>

        @include('livewire.widgets.admin.title-page')
        @include('livewire.widgets.admin.more-options')
        <div class="separator mb-5"></div>
    </div>

    @if($frame)
        @include('livewire.admin.category.'. $frame)
    @endif

    <div class="col-md-12 list">
        @include('livewire.widgets.admin.table-basic')
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/jquery.contextMenu.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/select2-bootstrap.min.css') }}"/>
@endpush

@push('scripts')

    <script src="{{ asset('assets/admin/js/vendor/jquery.contextMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/select2.full.js') }}"></script>


    <script type="text/javascript">

        $(document).ready(function () {
            window.livewire.on('refresh', () => {
                activeSelect2('#parent', 'parent');
            });

            window.livewire.on('showModal', () => {
                $('#showModal').modal('show');
                activeSelect2('#parent', 'parent');
            });

            window.livewire.on('closeModal', () => {
                $('#showModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });

            window.livewire.on('deleteAlert', () => {
                deleteSwal();
            });
        });

        function activeSelect2(sel, varModel) {
            $(sel).select2();
            $(sel).on('change', function (e) {
                @this.
                set(varModel, e.target.value);
            });
        }
    </script>
@endpush
