<x-frontend-layout>

    @push('styles')
        <style>
            input.form-control,
            textarea.form-control {
                border-radius: 0 !important;
            }

            button, .btn {
                border-radius: 0 !important;
            }
        </style>
    @endpush

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ URL::to('/') }}" rel="nofollow">Inicio</a>
                {{--                    <span></span> Pages--}}
                <span></span> Iniciar sesión @push('title')
                    {{ __('Iniciar sesión') }}
                @endpush
            </div>
        </div>
    </div>

    <section class="pt-50 pb-150">
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div
                            class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Iniciar sesión</h3>
                                </div>
                                <x-jet-validation-errors class="mb-4"/>
                                <form name="frm-login" method="post" action="{{ route('login') }}">
                                    @csrf

                                    <fieldset class="form-floating mb-3">
                                        <input type="text" class="form-control" id="frm-login-uname" name="email"
                                               placeholder="Correo"
                                               :value="old('email')" required autofocus>
                                        <label for="frm-login-uname">EMAIL: </label>
                                        @error('email') <span
                                            class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                    </fieldset>

                                    <fieldset class="form-floating mb-3">
                                        <input type="password" class="form-control" id="frm-login-pass" name="password"
                                               placeholder="Contraseña" required autocomplete="current-password">
                                        <label for="frm-login-pass">CONTRASEÑA:</label>
                                        @error('password') <span
                                            class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                    </fieldset>

                                    <fieldset class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" value="forever">
                                                <label class="form-check-label"
                                                       for="exampleCheckbox1"><span>Recuérdame</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="{{ route('password.request') }}">¿Has olvidado tu
                                            contraseña?</a>
                                    </fieldset>

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up btn-submit"
                                                name="submit">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </form>

                            </div>
                            <div class="d-grid gap-2 mt-30">
                                <div class="text-center">
                                    O Iniciar sessión con:
                                </div>
                                <a href="{{ route('auth.redirect-facebook') }}"
                                   class="btn btn-fill-out btn-block hover-up col-md-12">
                                    <i class="simple-icon-social-facebook"></i>
                                    Facebook
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
