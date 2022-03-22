<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
            $buttons = ['is_add' => false];
            ?>

            @include('livewire.widgets.admin.title-page')

            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <img src="{{ asset('assets/images/logo').'/'.$logo_dark }}"
                         class="img-fluid border-radius mt-2 border-0 shadow-sm" alt="" width="220">
                    <hr>
                    <div class="text-center"><h6>Ultima actualización:</h6>
                        <span class="font-italic text-small text-primary">
                            {{ $updated_at }}
                        </span>
                    </div>
                    <hr>

                    <div
                        class="d-flex flex-row align-items-center mb-3 {{ $website=='general'?'border border-primary border-radius':'' }}">
                        <a class="d-block position-relative ml-2" href="#"
                           wire:click.prevent="generalInformation(false)">
                            <i class="iconsminds-file-clipboard-file---text large-icon initial-height"></i>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#" wire:click.prevent="generalInformation(false)">
                                <p class="list-item-heading mb-1 {{ $website=='general'?'color-theme-1':'' }}">
                                    Información General</p>
                            </a>
                        </div>
                    </div>

                    <div
                        class="d-flex flex-row align-items-center mb-3 {{ $website=='logoSecond'?'border border-primary border-radius':'' }}">
                        <a class="d-block position-relative ml-2" href="#"
                           wire:click.prevent="logoSecond(false)">
                            <i class="iconsminds-stop large-icon initial-height"></i>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#" wire:click.prevent="logoSecond(false)">
                                <p class="list-item-heading mb-1 {{ $website=='logoSecond'?'color-theme-1':'' }}">
                                    Logo secundario</p>
                            </a>
                        </div>
                    </div>

                    <div
                        class="d-flex flex-row align-items-center mb-3 {{ $website=='media'?'border border-primary border-radius':'' }}">
                        <a class="d-block position-relative ml-2" href="#" wire:click.prevent="socialMedia(false)">
                            <i class="iconsminds-posterous large-icon initial-height"></i>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#" wire:click.prevent="socialMedia(false)">
                                <p class="list-item-heading mb-1 {{ $website=='media'?'color-theme-1':'' }}">Media
                                    Social</p>
                            </a>
                        </div>
                    </div>

                    <div
                        class="d-flex flex-row align-items-center mb-3 {{ $website=='missionAndVision'?'border border-primary border-radius':'' }}">
                        <a class="d-block position-relative ml-2" href="#" wire:click.prevent="missionAndVision(false)">
                            <i class="iconsminds-notepad large-icon initial-height"></i>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#" wire:click.prevent="missionAndVision(false)">
                                <p class="list-item-heading mb-1 {{ $website=='missionAndVision'?'color-theme-1':'' }}">
                                    Misión y Visión</p>
                            </a>
                        </div>
                    </div>

                    <div
                        class="d-flex flex-row align-items-center mb-3 {{ $website=='bannerTop'?'border border-primary border-radius':'' }}">
                        <a class="d-block position-relative ml-2" href="#" wire:click.prevent="bannerTop(false)">
                            <i class="iconsminds-quill-3 large-icon initial-height"></i>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#" wire:click.prevent="bannerTop(false)">
                                <p class="list-item-heading mb-1" {{ $website=='bannerTop'?'color-theme-1':'' }}>Banner
                                    Top</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="card mb-4">
                <div class="card-body content-settings">

                    @include('livewire.admin.settingWebsite.'.$website)

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.list-item-heading').on('click', function () {
                if ($(this).hasClass('color-theme-1')) {
                    $('h3.card-title').html($(this).html());
                }
            })

            window.livewire.on('cleanSection', () => {
                Livewire.emit('toRefresh')
            });

            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg[0]}!`, 'rgba(0,113,172,0.5)');
            });

            // loadTinyMce('textarea.mission', 'mission');
            // loadTinyMce('textarea.vision', 'vision');
        });

    </script>
@endpush

