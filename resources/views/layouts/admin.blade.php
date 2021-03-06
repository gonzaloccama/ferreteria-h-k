<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@stack('title') | Admin - Ferrotools</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/favicon.png') }}">

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

        .table-hover tbody tr:hover {
            color: #585858;
        }

        .swal-modal {
            border-radius: 0 !important;
            box-shadow: 0 0px 5px 0px rgba(221, 221, 221, 0.31) !important;
        }

        .swal-modal-delete {
         border-radius: 0 !important;
            box-shadow: 0 0px 5px 0px rgba(221, 221, 221, 0.31) !important;
            background-color: rgba(255, 255, 255, 0.94) !important;
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
            border: 1px dashed #328359;
            background-color: rgba(10, 52, 32, 0.15);
            color: #328359;
            padding: 5px;
            margin: 0;
        }

        .modal .form-group label,
        .title-page h1,
        .content-settings .card-title,
        form .form-group label {
            text-transform: uppercase;
        }

        .rajdhani {
            font-family: 'Rajdhani' !important;
        }

        .weight-300 {
            font-weight: 300 !important;
        }

        .weight-400 {
            font-weight: 400 !important;
        }

        .weight-700 {
            font-weight: 700 !important;
        }

        .font-18 {
            font-size: 18px !important;
        }

        .font-14 {
            font-size: 14px !important;
        }

        .font-15 {
            font-size: 15px !important;
        }

        /*** CKeditor 5 ***/

        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar-track,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #b0b0b0;
            border-radius: 10px;
        }

        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar {
            border-radius: 10px;
            width: 5px;
            height: 5px;
            background-color: #b0b0b0;
        }

        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline::-webkit-scrollbar-thumb,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #53575a;
        }

        .ck.ck-editor__main,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-focused.ck-editor__editable_inline,
        .ck.ck-editor__main .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-blurred.ck-editor__editable_inline {
            min-height: 120px !important;
            max-height: 200px !important;
        }

        .ck.ck-button.ck-off {
            color: #737373 !important;
        }

        .ck.ck-button.ck-off:hover {
            color: #1D477A !important;
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

<script type="text/javascript">
    function notificationSwal(mssg, stl = 'rgba(8,129,120,0.9)', stts = 'success') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            customClass: {
                popup: 'swal-modal'
            },
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
                cancelButton: 'btn btn-danger mr-3',
                popup: 'swal-modal-delete',
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
            reverseButtons: true,
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
</script>

</body>

</html>
