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
        @include('livewire.admin.homeSlider.' . $frame)
    @endif

    <div class="col-md-12 list">
        @include('livewire.widgets.admin.table-basic')
    </div>
</div>

@push('styles')
    {{--    <link rel="stylesheet" href="{{ asset('assets/plugins/table/style.css') }}"/>--}}
@endpush

@push('scripts')
    {{--    <script src="{{ asset('assets/plugins/table/script.js') }}"></script>--}}
{{--    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>--}}

    <script type="text/javascript">
        $(document).ready(function () {

            window.livewire.on('showModal', () => {
                $('#showModal').modal('show');
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

    </script>

@endpush
