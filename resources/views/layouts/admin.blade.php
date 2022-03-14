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

        .ordered{
            border: 1px dashed #568d15;
            background-color: rgba(86, 141, 21, 0.15);
            color: #568d15;
            padding: 5px;
            margin: 0;
        }

        .delivered{
            border: 1px dashed #fc751c;
            background-color: rgba(252, 117, 28, 0.15);
            color: #fc751c;
            padding: 5px;
            margin: 0;
        }

        .canceled{
            border: 1px dashed #f63c44;
            background-color: rgba(246, 60, 68, 0.15);
            color: #f63c44;
            padding: 5px;
            margin: 0;
        }

        .completed{
            border: 1px dashed #0c4128;
            background-color: rgba(10, 52, 32, 0.15);
            color: #0c4128;
            padding: 5px;
            margin: 0;
        }

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
