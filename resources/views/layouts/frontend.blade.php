<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <title>@stack('title') | {{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.png') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/font/iconsmind-s/css/iconsminds.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/font/simple-line-icons/css/simple-line-icons.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

    @livewireStyles

    @stack('styles')

    <style>


        .product-wish {
            background-color: #088178 !important;
            color: #eeecec !important;
        }

        .alert, .btn {
            border-radius: 0;
        }

        .error {
            font-size: 11px;
        }

        input.form-control,
        textarea.form-control {
            border-radius: 0 !important;
        }

        button, .btn {
            border-radius: 0 !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        .font-13 {
            font-size: 13px !important;
        }

        .font-12 {
            font-size: 12px !important;
        }

        .rajdhani {
            font-family: 'Rajdhani' !important;
        }

        .weight-300 {
            font-weight: 300;
        }

        .weight-400 {
            font-weight: 400;
        }

        .weight-700 {
            font-weight: 700;
        }

        .font-18 {
            font-size: 18px
        }

        .font-14 {
            font-size: 14px
        }

        .font-15 {
            font-size: 15px
        }

        /*** forms required messages  ***/
        .required-form {
            font-size: 8px !important;
            position: absolute !important;
            padding-top: 6px !important;
            margin-left: 4px !important;
        }

        /*** Menu header ***/
        .menu-ecommerce a {
            color: #e3e3e3 !important;
            font-family: 'Rajdhani' !important;
            font-size: 16px !important;
            font-weight: 550 !important;
            text-transform: uppercase !important;
            /*padding-left: 20px;*/
            /*padding-right: 20px;*/
            /*margin-bottom: 2px;*/
            /*margin-top: 2px;*/
        }

        /*.menu-ecommerce a:hover {*/
        /*    !*background-color: var(--orange-golden);*!*/
        /*    padding-top: -5px;*/
        /*    padding-bottom: -5px;*/
        /*    border-top: 1px solid #fff;*/
        /*    border-bottom: 1px solid #fff;*/
        /*}*/

        .menu-ecommerce li a::after {
            content: "";
            display: block !important;
            margin: auto !important;
            height: 2px !important;
            width: 0 !important;
            top: 5px !important;
            background: transparent;
            transition: all 0.3s !important;
        }

        .menu-ecommerce li a:hover::after, li > a.active::after {
            width: 100% !important;
            background: #e3e3e3 !important;
        }

        .icon-user {
            border: 1px solid var(--st-patricks-blue);
            padding: 5px 5px 2px 5px;
            border-radius: 25px;
            box-shadow: 0 0 1px 0 var(--st-patricks-blue);
        }

        .mini-cart-icon svg {
            fill: #fff !important;
        }

        /*** noViSlider ***/
        .slider.noUi-target.noUi-ltr.noUi-horizontal {
            /*height: 10px !important;*/
            border-color: rgba(255, 255, 255, 0) !important;
            border-radius: 50px !important;
            background-color: rgba(255, 255, 255, 0) !important;
            margin: 0 38px 0 3px !important;
            box-shadow: none !important;
        }

        /*.noUi-handle.noUi-handle-lower {*/
        /*    margin-top: -4px !important;*/
        /*    border: none !important;*/
        /*    background-color: #1D477A;*/
        /*    width: 32px !important;*/
        /*    height: 26px !important;*/
        /*    box-shadow: 0 0 2px 0 rgba(152, 152, 152, 0.79) !important;*/
        /*}*/

        /*.noUi-tooltip {*/
        /*    height: 28px !important;*/
        /*    color: #1D477A !important;*/
        /*    font-weight: 700 !important;*/
        /*}*/

        .noUi-target {
            height: 15px;
            border: none;
            margin: 40px 0 0 0;
        }

        .noUi-target .noUi-base {
            background: linear-gradient(117deg, var(--y-in-mn-blue) 0, var(--blue-gray) 100%);
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .noUi-target .noUi-base .noUi-connect {
            background: var(--st-patricks-blue);
        }

        .noUi-target .noUi-base .noUi-tooltip {
            bottom: -35px;
            color: var(--st-patricks-blue);
            border: none;
            outline: none;
            box-shadow: 0 0 1px 0 var(--y-in-mn-blue);
            padding: 2px 8px 3px 8px;
            opacity: 0.82;
            font-weight: bold;
            border-radius: 6px;
        }

        .noUi-handle.noUi-handle-lower {
            background: var(--st-patricks-blue);
            border-radius: 20px;
            width: 30px;
            height: 30px;
            outline: none;
            /*right: 0px;*/
            top: -8px;
            cursor: pointer;
            box-shadow: none;
            border: 3px solid #ffffff;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .noUi-handle.noUi-handle-lower.noUi-active {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
        }

        .noUi-handle.noUi-handle-lower::before, .noUi-handle.noUi-handle-lower::after {
            display: none;
        }

        .noUi-handle.noUi-handle-lower .noUi-touch-area {
            width: 30px;
            height: 30px;
        }

        /****/
        .noUi-handle.noUi-handle-upper {
            background: var(--st-patricks-blue);
            border-radius: 20px;
            width: 30px;
            height: 30px;
            outline: none;
            /*right: 0px;*/
            top: -8px;
            cursor: pointer;
            box-shadow: none;
            border: 3px solid #ffffff;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .noUi-handle.noUi-handle-upper.noUi-active {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2);
        }

        .noUi-handle.noUi-handle-upper::before, .noUi-handle.noUi-handle-upper::after {
            display: none;
        }

        .noUi-handle.noUi-handle-upper .noUi-touch-area {
            width: 30px;
            height: 30px;
        }
    </style>

    <style>

        .nav-link {
            border-radius: 0px !important;
            transition: all 0.5s;

            display: flex;
            flex-direction: column
        }

        .nav-link small {
            font-size: 12px
        }

        .nav-link:hover {
            color: var(--st-patricks-blue) !important;
            background-color: rgba(4, 57, 103, 0.25) !important
        }

        .nav-link .animation {
            transition: all 1s;
            font-size: 20px
        }

        .nav-link:hover .animation {
            transform: rotate(360deg)
        }

        .active-1 {
            color: #fff !important;
            background-color: var(--st-patricks-blue) !important;
        }

        .text-theme-1 {
            color: var(--st-patricks-blue);
            font-family: rajdhani;
        }

        .bg-header {
            color: rgba(255, 255, 255, 0.93) !important;
            background-color: var(--charcoal) !important;
            font-weight: 200 !important;
        }

        .active-filter,
        .active-filter .page-link {
            color: rgba(255, 255, 255, 0.93) !important;
            background-color: #41506B !important;
        }

        .badge-success-1 {
            border: 1px dashed #157045;
            background-color: rgba(10, 52, 32, 0.15);
            color: #157045;
            padding: 5px;
            margin: 0;
        }

        .badge-danger-1 {
            border: 1px dashed #f63c44;
            background-color: rgba(246, 60, 68, 0.15);
            color: #f63c44;
            padding: 5px;
            margin: 0;
        }

        .ordered {
            border: 1px dashed #568d15;
            background-color: rgba(86, 141, 21, 0.15);
            color: #568d15;
            padding: 5px;
            margin: 0;
        }

        .delivered {
            border: 1px dashed #fc751c;
            background-color: rgba(252, 117, 28, 0.15);
            color: #fc751c;
            padding: 5px;
            margin: 0;
        }

        .canceled {
            border: 1px dashed #f63c44;
            background-color: rgba(246, 60, 68, 0.15);
            color: #f63c44;
            padding: 5px;
            margin: 0;
        }

        .completed {
            border: 1px dashed #0c4128;
            background-color: rgba(10, 52, 32, 0.15);
            color: #0c4128;
            padding: 5px;
            margin: 0;
        }

        .page-link {
            border-radius: 0 !important;
            color: var(--charcoal) !important;
        }

        .page-link:hover {
            color: var(--azure-x-11) !important;
        }

        .active .page-link {
            color: var(--azure-x-11) !important;
        }


        /*** button extra small ***/
        .btn.btn-extra-sm {
            line-height: 1 !important;
            padding: 5px 15px 3px 15px !important;
            min-width: unset !important;
            display: table !important;
            border-radius: 15px !important;
        }

        input.search {
            border: 1px solid rgba(65, 80, 107, 0.96) !important;
            border-radius: 0;
        }

        input.search:focus {
            border: 1px solid rgba(6, 58, 152, 0.96) !important;
        }
    </style>

    <style>
        .rating-star {
            color: #ED8A19 !important;
        }

        .rating {
            font-size: 16px;
            font-weight: 600;
            color: #808080;
        }

        .rating-stars {
            height: 50px;
            padding: 2px;
        }


        .rating-stars div {
            color: #ED8A19;
            font-size: 18px;
            font-family: sans-serif;
            font-weight: 800;
            text-transform: uppercase;
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars input + label {
            font-size: 18px;
            cursor: pointer;
        }

        .rating-stars input:checked + label ~ label {
            color: #838383;
        }

        .rating-stars label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }
    </style>

</head>

<body>

<!-- Modal -->
{{--<div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="deal" style="background-image: url('assets/frontend/imgs/banner/menu-banner-7.png')">--}}
{{--                    <div class="deal-top">--}}
{{--                        <h2 class="text-brand">Deal of the Day</h2>--}}
{{--                        <h5>Limited quantities.</h5>--}}
{{--                    </div>--}}
{{--                    <div class="deal-content">--}}
{{--                        <h6 class="product-title"><a href="shop-product-right.html">Summer Collection New Morden--}}
{{--                                Design</a></h6>--}}
{{--                        <div class="product-price"><span class="new-price">$139.00</span><span--}}
{{--                                class="old-price">$160.99</span></div>--}}
{{--                    </div>--}}
{{--                    <div class="deal-bottom">--}}
{{--                        <p>Hurry Up! Offer End In:</p>--}}
{{--                        <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"><span--}}
{{--                                class="countdown-section"><span class="countdown-amount hover-up">03</span><span--}}
{{--                                    class="countdown-period"> days </span></span><span class="countdown-section"><span--}}
{{--                                    class="countdown-amount hover-up">02</span><span--}}
{{--                                    class="countdown-period"> hours </span></span><span class="countdown-section"><span--}}
{{--                                    class="countdown-amount hover-up">43</span><span--}}
{{--                                    class="countdown-period"> mins </span></span><span class="countdown-section"><span--}}
{{--                                    class="countdown-amount hover-up">29</span><span--}}
{{--                                    class="countdown-period"> sec </span></span></div>--}}
{{--                        <a href="shop-grid-right.html" class="btn hover-up">Shop Now <i--}}
{{--                                class="fi-rs-arrow-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Quick view -->


@livewire('front-end-modal')

<!--  Header  -->
<?php
$website = App\Models\SettingSite::find(1);
?>
@include('layouts.frontend.header')

<!--  Header responsive  -->
@include('layouts.frontend.header-responsive')

<main class="main">
    {{--    content    --}}
    {{ $slot }}
    {{--    @yield('content')--}}
</main>

{{--    footer    --}}
@include('layouts.frontend.footer')

<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <h5 class="mb-10">Cargando</h5>
                <div class="loader">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->

<!-- Messenger Chat Plugin Code -->
<div id="fb-root" style="margin-bottom: 0px !important;"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "2202093920029853");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_ES/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

@livewireScripts

<script src="{{ asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/frontend/js/shop.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

<script type="text/javascript">
    function notificationSwal(mssg, stl = 'rgba(8,64,129,0.9)', stts = 'success') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: stts,
            title: `<div class="text-white font-sm">${mssg}</div>`,
            background: stl,
            iconColor: '#efefef',
        })
    }

    function deleteSwal() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ml-3',
                cancelButton: 'btn btn-danger mr-3'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '??Estas seguro?',
            text: "??No podr??s revertir esto esta acci??n!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminarlo!',
            cancelButtonText: 'No, Cancelar!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                Livewire.emit('activeConfirm');

                swalWithBootstrapButtons.fire(
                    '??Eliminado!',
                    'El registro ha sido eliminado. <i class="far fa-dizzy text-danger"></i>',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '??Cancelado!',
                    'Tu registro est?? a salvo <i class="far fa-smile-beam text-primary"></i>',
                    'error'
                )
            }
        })
    }

    function uppercaseText(string) {
        // return string.charAt(0).toUpperCase() + string.slice(1);
        return string.toUpperCase();
    }


</script>

@stack('scripts')


</body>

</html>
