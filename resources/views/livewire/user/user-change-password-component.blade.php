<div>
    <?php
    $up_page = ['page' => 'User', 'route' => route('user.dashboard')];
    ?>

    @include('livewire.widgets.breadcrumb')
    <section class="">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-10 mt-40 mb-40">

                    <div class="col-md-12 list">
                        <h4 class="mt-10 mb-10 text-uppercase" style="font-weight: 200;">{{ $title }}</h4>

                        @include('livewire.user.user-change-password.'. $frame)

                    </div>
                </div>
                <div class="col-lg-2 primary-sidebar sticky-sidebar">
                    @include('livewire.user.layout.sidebar')
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg}!`, 'rgba(8,129,120,0.9)');
            });
        });
    </script>
@endpush

