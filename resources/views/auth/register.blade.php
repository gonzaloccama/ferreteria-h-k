

<x-frontend-layout>

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ URL::to('/') }}" rel="nofollow">Inicio</a>
                <span></span> Crear una cuenta @push('title'){{ __('Crear una cuenta') }}@endpush
            </div>
        </div>
    </div>
    <section class="pt-50 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 m-auto">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Crear una Cuenta</h3>
                                    </div>
                                    <p class="mb-50 font-sm">
                                        Sus datos personales se utilizarán para respaldar su experiencia en este sitio
                                        web, para administrar el acceso a su cuenta y para otros fines descritos en
                                        nuestra política de privacidad.
                                    </p>

{{--                                    <x-jet-validation-errors class="mb-4"/>--}}

                                    <form class="form-stl" action="{{ route('register') }}" name="frm-login"
                                          method="POST">
                                        @csrf

                                        <h4 class="form-subtitle pb-4">Información personal</h4>

                                        <fieldset class="form-floating mb-3">
                                            <input type="text" class="form-control" id="frm-reg-lname" name="name" placeholder="Nombre de usuario"
                                                   :value="name" autocomplete="name" autofocus>
                                            <label for="frm-reg-lname">NOMBRES <span class="text-danger">*</span></label>
                                            @error('name') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                        </fieldset>

                                        <fieldset class="form-floating mb-3">
                                            <input type="text" class="form-control" id="frm-login-uname" name="email" placeholder="Correo Electrónico"
                                                   :value="email" autofocus>
                                            <label for="frm-login-uname">EMAIL <span class="text-danger">*</span></label>
                                            @error('email') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                        </fieldset>

                                        <h4 class="form-subtitle pt-4 pb-4">Información de inicio de sesión</h4>

                                        <fieldset class="form-floating mb-3">
                                            <input type="password" class="form-control" id="frm-reg-pass" name="password"
                                                   placeholder="Contraseña"  autocomplete="new-password">
                                            <label for="frm-reg-pass">CONTRASEÑA <span class="text-danger">*</span></label>
                                            @error('password') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                        </fieldset>

                                        <fieldset class="form-floating mb-3">
                                            <input type="password" class="form-control" id="frm-reg-cfpass" name="password_confirmation"
                                                   placeholder="Contraseña"  autocomplete="new-password">
                                            <label for="frm-reg-cfpass">CONFIRMAR CONTRASEÑA <span class="text-danger">*</span></label>
                                            @error('password_confirmation') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                        </fieldset>


{{--                                        <div class="login_footer form-group">--}}
{{--                                            <div class="chek-form">--}}
{{--                                                <div class="custome-checkbox">--}}
{{--                                                    <input class="form-check-input" type="checkbox" name="checkbox"--}}
{{--                                                           id="exampleCheckbox12" value="">--}}
{{--                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <a href="page-privacy-policy.html"><i--}}
{{--                                                    class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>--}}
{{--                                        </div>--}}


                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up btn-sign"
                                                    name="register">Registrar
                                            </button>
                                        </div>
                                    </form>
                                    {{--                                    <div class="divider-text-center mt-15 mb-15">--}}
                                    {{--                                        <span> or</span>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <ul class="btn-login list_none text-center mb-15">--}}
                                    {{--                                        <li><a href="#" class="btn btn-facebook hover-up mb-lg-0 mb-sm-4">Login With--}}
                                    {{--                                                Facebook</a></li>--}}
                                    {{--                                        <li><a href="#" class="btn btn-google hover-up">Login With Google</a></li>--}}
                                    {{--                                    </ul>--}}
                                    {{--                                    <div class="text-muted text-center">Already have an account? <a href="#">Sign in--}}
                                    {{--                                            now</a></div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-frontend-layout>
