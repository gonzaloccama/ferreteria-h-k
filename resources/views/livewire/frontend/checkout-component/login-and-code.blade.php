<div class="row">
    <div class="col-lg-6 mb-sm-15">
        <div class="toggle_info">
            <span>
                <i class="fi-rs-user mr-10"></i>
                <span class="text-muted">¿Ya tienes una cuenta?</span>
                <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                    Haga clic aquí para ingresar
                </a>
            </span>
        </div>
        <div class="panel-collapse collapse login_form" id="loginform">
            <div class="panel-body">
                @if(!Auth::check())
                    <p class="mb-30 font-sm">Si ha comprado con nosotros anteriormente, ingrese sus datos a
                        continuación. Si
                        es un cliente nuevo, vaya a Facturación &amp; Sección de envíos.</p>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Username Or Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="login_footer form-group">
                            <div class="chek-form">
                                <div class="custome-checkbox">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="remember"
                                           value="">
                                    <label class="form-check-label" for="remember"><span>Recuérdame</span></label>
                                </div>
                            </div>
                            <a href="#">¿Se te olvidó tu contraseña?</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-md" name="login">Iniciar sesión</button>
                        </div>
                    </form>
                @else
                    <h6 class="display-6 text-center" style="font-size: 22px;">¡No necesitas iniciar sessión!</h6>
                @endif

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="toggle_info">
            <span><i class="fi-rs-label mr-10"></i>
                <span class="text-muted">¿Tiene un cupón?</span>
                <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">
                    Haga clic aquí para ingresar su código</a>
            </span>
        </div>
        <div class="panel-collapse collapse coupon_form " id="coupon">
            <div class="panel-body">
                <p class="mb-30 font-sm">Si tiene un código de cupón, aplíquelo a continuación.</p>
                <form method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Coupon Code...">
                    </div>
                    <div class="form-group">
                        <button class="btn  btn-md" name="login">Aplicar cupón</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
