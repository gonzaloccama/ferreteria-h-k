<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <div class="contact-from-area padding-20-row-col wow FadeInUp">
                <h3 class="mb-10 text-center">Escríbanos su mensaje</h3>
                {{--                <p class="text-muted mb-30 text-center font-sm">Lorem ipsum dolor sit amet consectetur.</p>--}}
                <form class="contact-form-style" id="contact-form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $dt = [
                                'name' => 'name',
                                'text' => 'Nombres',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $dt = [
                                'name' => 'email',
                                'text' => 'Correo Electronico',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $dt = [
                                'name' => 'mobile',
                                'text' => 'celular',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <?php
                            $dt = [
                                'name' => 'subject',
                                'text' => 'Asunto',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <?php
                            $dt = [
                                'name' => 'message',
                                'text' => 'Mensaje',
                                'required' => 1,
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-textarea', $dt)
                            <button class="submit submit-auto-width" wire:click.prevent="saveData">Enviar</button>
                        </div>
                    </div>
                </form>
                <p class="form-messege"></p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">

            <div class="mb-md-0">
                <h4 class="mb-15 text-brand">Dirección</h4>
                {{ $pageSetting->address }}<br>
                Puno, Perú<br><br>
                <abbr title="Horario">Horario:</abbr> {{ $pageSetting->attention }} <br>
                <abbr title="Código postal">Código postal: </abbr>{{ $pageSetting->postal_code }}<br>
                <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"
                   href="https://goo.gl/maps/osus25dxyLF3YTLe7" target="_blank">
                    <i class="fi-rs-marker mr-10"></i>Ver mapa</a>
            </div>
            <div class="mb-md-0 mt-30">
                <h4 class="mb-15 text-brand">Contactos</h4>
                <abbr title="Celular">Celular: </abbr>{{ $pageSetting->phone }}<br>
                <abbr title="Celular">Email: </abbr>{{ $pageSetting->email }}<br>
            </div>

            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0 mt-30">
                <?php
                $socials = json_decode($pageSetting->media_social);
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
</div>
