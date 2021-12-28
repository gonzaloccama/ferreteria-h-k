<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@stack('title') | Admin - Ferrotools</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/admin/fontawesome/css/all.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/font/iconsmind-s/css/iconsminds.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/font/simple-line-icons/css/simple-line-icons.css') }}"/>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/bootstrap.rtl.only.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/component-custom-switch.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/perfect-scrollbar.css') }}"/>

    @stack('styles')

    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.css') }}"/>

    @livewireStyles

    <style>
        .modal .form-group label,
        .title-page h1,
        .content-settings .card-title,
        form .form-group label {
            text-transform: uppercase;
        }

    </style>

</head>

<body id="app-container" class="menu-default show-spinner">

<!--header-->
@include('layouts.admin.navbar')

<!--header-->
@include('layouts.admin.menu')


<main>
    <div class="container-fluid">
        {{--    content    --}}
        {{ $slot }}
    </div>
</main>

{{--    footer    --}}
@include('layouts.admin.footer')


<script src="{{ asset('assets/admin/js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/bootstrap.bundle.min.js') }}"></script>
{{--<script src="{{ asset('assets/admin/js/vendor/moment.min.js') }}"></script>--}}
<script src="{{ asset('assets/admin/js/vendor/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendor/mousetrap.min.js') }}"></script>


@livewireScripts
@stack('scripts')

<script src="{{ asset('assets/admin/js/dore.script.js') }}"></script>
<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.js') }}"></script>


</body>

</html>
