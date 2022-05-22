<footer class="main">

    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">

            </div>
        </div>
    </section>

    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo/logo.png') }}"
                                                      alt="logo" style="width: 190px !important;">
                            </a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contactenos</h5>
                        <p class="wow fadeIn animated">
                            <strong>Drección: </strong>{{ $website->address }}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Teléfono: </strong><a href="tel:{{ $website->phone }}">+51 {{ $website->phone }}</a>
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>Horas: </strong>{{ $website->attention }}
                        </p>
                        <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Síguenos</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <?php
                            $socials = json_decode($website->media_social);
                            ?>
                            @foreach($socials as $key => $social)
                                @if(isset($social) && !empty($social))
                                    @if($key != 'whatsapp')
                                        <a href="{{ $social }}">
                                            <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons').'/icons-' . $key . '.svg' }}"
                                                alt="{{ $key }}">
                                        </a>
                                    @else
                                        <a href="https://api.whatsapp.com/send?phone={{ $social }}">
                                            <img
                                                src="{{ asset('assets/frontend/imgs/theme/icons').'/icons-' . $key . '.svg' }}"
                                                alt="{{ $key }}">
                                        </a>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <h5 class="widget-title wow fadeIn animated">Acerca de</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        <li><a href="#">Sobre nosotros</a></li>
                        {{--                        <li><a href="#">Delivery Information</a></li>--}}
                        {{--                        <li><a href="#">Privacy Policy</a></li>--}}
                        {{--                        <li><a href="#">Terms &amp; Conditions</a></li>--}}
                        <li><a href="#">Contactenso</a></li>
                        {{--                        <li><a href="#">Support Center</a></li>--}}
                    </ul>
                </div>
                <div class="col-lg-2  col-md-3">
                    <h5 class="widget-title wow fadeIn animated">Mi cuenta</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <li><a href="#">Iniciar Sesión</a></li>
                        <li><a href="#">Ver carrito</a></li>
                        <li><a href="#">Mi lista de deseos</a></li>
                        <li><a href="#">Seguimiento de mi pedido</a></li>
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="#">Orden</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="widget-title wow fadeIn animated">Mas</h5>
                    <div class="row">
                        {{--                        <div class="col-md-8 col-lg-12">--}}
                        {{--                            <p class="wow fadeIn animated">From App Store or Google Play</p>--}}
                        {{--                            <div class="download-app wow fadeIn animated">--}}
                        {{--                                <a href="#" class="hover-up mb-sm-4 mb-lg-0"><img class="active"--}}
                        {{--                                                                                  src="{{ asset('assets/frontend/imgs/theme/app-store.jpg') }}"--}}
                        {{--                                                                                  alt=""></a>--}}
                        {{--                                <a href="#" class="hover-up"><img--}}
                        {{--                                        src="{{ asset('assets/frontend/imgs/theme/google-play.jpg') }}" alt=""></a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                            <p class="mb-20 wow fadeIn animated">Pagos seguras</p>
                            <img class="wow fadeIn animated"
                                 src="{{ asset('assets/frontend/imgs/theme/payment-method.png') }}"
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-20 wow fadeIn animated">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <p class="float-md-left font-sm text-muted mb-0">&copy; {{ Carbon\Carbon::now()->year }}, <strong
                        class="text-brand">FERRETOOLS</strong>
                    - All rights reserved</p>
            </div>
            <div class="col-lg-6">
                <p class="text-lg-end text-start font-sm text-muted mb-0">
                    Designed and Developed by <a href="{{ __('https://oncelcn.com') }}" target="_blank">ONCELCN</a>.
                </p>
            </div>
        </div>
    </div>
</footer>

