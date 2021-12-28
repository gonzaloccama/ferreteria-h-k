<x-guest-layout>

    @php
        $website = App\Models\SettingSite::find(1)
    @endphp

    @push('header')
        @include('layouts.frontend.header')
    @endpush

    @push('header-responsive')
        @include('layouts.frontend.header-responsive')
    @endpush

    @push('footer')
        @include('layouts.frontend.footer')
    @endpush

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ URL::to('/') }}" rel="nofollow">Inicio</a>
                {{--                    <span></span> Pages--}}
                <span></span> Login @push('title'){{ __('Inicio de Sesión') }}@endpush
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
                                    <h3 class="mb-30">Login</h3>
                                </div>
                                <x-jet-validation-errors class="mb-4"/>
                                <form name="frm-login" method="post" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="form-group">
                                        <label for="frm-login-uname">EMAIL:</label>
                                        <input type="text" id="frm-login-uname" name="email" placeholder="Correo"
                                               :value="old('email')" required autofocus>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <label for="frm-login-pass">CONTRASEÑA:</label>
                                        <input type="password" id="frm-login-pass" name="password"
                                               placeholder="Contraseña" required autocomplete="current-password">
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
                                        <a class="text-muted" href="{{ route('password.request') }}">¿Se te olvidó tu
                                            contraseña?</a>
                                    </fieldset>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up btn-submit"
                                                name="submit">
                                            Iniciar sesión
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{--    <!--main area-->--}}
    {{--    <main id="main" class="main-site left-sidebar">--}}

    {{--        <div class="container">--}}

    {{--            <div class="wrap-breadcrumb">--}}
    {{--                <ul>--}}
    {{--                    <li class="item-link"><a href="{{ URL::to('/') }}" class="link">home</a></li>--}}
    {{--                    <li class="item-link"><span>login</span></li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">--}}
    {{--                    <div class=" main-content-area">--}}
    {{--                        <div class="wrap-login-item ">--}}
    {{--                            <div class="login-form form-item form-stl">--}}

    {{--                                <x-jet-validation-errors class="mb-4"/>--}}

    {{--                                <form name="frm-login" method="POST" action="{{ route('login') }}">--}}
    {{--                                    @csrf--}}
    {{--                                    <fieldset class="wrap-title">--}}
    {{--                                        <h3 class="form-title">Log in to your account</h3>--}}
    {{--                                    </fieldset>--}}
    {{--                                    <fieldset class="wrap-input">--}}
    {{--                                        <label for="frm-login-uname">Email Address:</label>--}}
    {{--                                        <input type="text" id="frm-login-uname" name="email"--}}
    {{--                                               placeholder="Type your email address"--}}
    {{--                                               :value="old('email')" required autofocus>--}}
    {{--                                    </fieldset>--}}
    {{--                                    <fieldset class="wrap-input">--}}
    {{--                                        <label for="frm-login-pass">Password:</label>--}}
    {{--                                        <input type="password" id="frm-login-pass" name="password"--}}
    {{--                                               placeholder="************" required autocomplete="current-password">--}}
    {{--                                    </fieldset>--}}

    {{--                                    <fieldset class="wrap-input">--}}
    {{--                                        <label class="remember-field">--}}
    {{--                                            <input class="frm-input " name="remember" id="remember" value="forever"--}}
    {{--                                                   type="checkbox"><span>Remember me</span>--}}
    {{--                                        </label>--}}
    {{--                                        <a class="link-function left-position" href="{{ route('password.request') }}"--}}
    {{--                                           title="Forgotten password?">Forgotten--}}
    {{--                                            password?</a>--}}
    {{--                                    </fieldset>--}}
    {{--                                    <input type="submit" class="btn btn-submit" value="Login" name="submit">--}}
    {{--                                </form>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div><!--end main products area-->--}}
    {{--                </div>--}}
    {{--            </div><!--end row-->--}}

    {{--        </div><!--end container-->--}}

    {{--    </main>--}}
    {{--    <!--main area-->--}}
</x-guest-layout>
