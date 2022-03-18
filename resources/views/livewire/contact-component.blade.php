<main class="main">
    <?php
    $up_page = ['page' => 'Tienda', 'route' => route('shop')];

    $pageSetting = \App\Models\SettingSite::find(1);
    ?>
    @include('livewire.widgets.breadcrumb')
    <section class="pt-20 pb-15 bg-green">
        <div class="container">
            <iframe style="width: 100%; height: 320px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1613.7705845990067!2d-70.02356842995145!3d-15.845297483774756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d69eaea3b9315%3A0xb8b5a947f95796a2!2sCEPREUNA!5e0!3m2!1ses!2spe!4v1637343855850!5m2!1ses!2spe"></iframe>
        </div>

    </section>

    <section class="pt-50 pb-50">
        @include('livewire.frontend.contact-component.'. $frame)
    </section>

</main>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            window.livewire.on('notification', (mssg) => {
                notificationSwal(`¡${mssg}!`, 'rgba(8,129,120,0.9)');
            });
        });
    </script>
@endpush
