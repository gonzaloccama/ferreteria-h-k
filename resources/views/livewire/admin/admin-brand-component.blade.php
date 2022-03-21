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

    @if($modeUpdate == 'create')
        @include('livewire.admin.brand.create')
    @elseif($modeUpdate == 'update')
        @include('livewire.admin.brand.update')
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
            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });
        });

        document.addEventListener('livewire:load', function (event) {
            @this.
            on('refreshF', function () {

                let tooltip_ = $('[data-toggle="tooltip"]');

                tooltip_.tooltip('dispose');
                tooltip_.tooltip('hide');
                tooltip_.tooltip();
            });

            //  init add events scripts
            @this.
            on('showModalAdd', function () {
                $('#addModal').modal('show')
                // loadTinyMce('textarea.title', 'title');
                // loadTinyMce('textarea.subtitle', 'subtitle');
            })

            //  end add events scripts

            //    init edit events scripts
            @this.
            on('showModalEdit', function () {
                $('#editModal').modal('show');
                // loadTinyMce('textarea.title', 'title');
                // loadTinyMce('textarea.subtitle', 'subtitle');
            });
            //    end edit events scripts

            @this.
            on('closeModal', function () {
                $('body').removeClass('modal-open');
                $('.modal-backdrop.fade.show').remove();
            });

            @this.
            on('cleanError', function () {
                $('.error.text-danger').html('');
            });

            @this.
            on('deleteAlert', function () {
                deleteSwal();
            });
        });

        // function loadTinyMce(sel, varModel) {
        //     tinymce.init({
        //         selector: sel,
        //         skin: "oxide-dark",
        //         content_css: "dark",
        //         // height: (window.innerHeight - 480),
        //         forced_root_block: false,
        //         setup: function (editor) {
        //             editor.on('init change', function () {
        //                 // editor.setContent(value);
        //                 editor.save();
        //             });
        //             editor.on('change', function (e) {
        //             @this.set(varModel, editor.getContent());
        //             });
        //         },
        //     });
        // }


    </script>

@endpush
