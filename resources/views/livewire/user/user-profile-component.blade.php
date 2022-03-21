

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

                        @include('livewire.user.profile.'. $frame)

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

@push('styles')
    <style>
        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
@endpush
