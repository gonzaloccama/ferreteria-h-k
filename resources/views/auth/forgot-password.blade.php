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
                <span></span> Recuperar contraseña @push('title'){{ __('Recuperar contraseña') }}@endpush
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
                                    <h3 class="mb-30"></h3>
                                </div>
                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                <x-jet-validation-errors class="mb-4"/>
                                <form name="frm-login" method="post" action="{{ route('password.email') }}">
                                    @csrf
                                    <fieldset class="form-floating mb-3">
                                        <input type="text" class="form-control" id="frm-login-uname" name="email"
                                               placeholder="Correo"
                                               :value="old('email')" required autofocus>
                                        <label for="frm-login-uname">EMAIL: </label>
                                        @error('email') <span
                                            class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                                    </fieldset>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up btn-submit"
                                                name="submit">
                                            Recuperar contraseña
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
</x-frontend-layout>


{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
