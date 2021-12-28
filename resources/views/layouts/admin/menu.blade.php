<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li>
                    <a href="#dashboard">
                        <i class="iconsminds-shop-4"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li class="{{ route('admin.categories') === url()->current()?'active':'' }}">
                    <a href="#categories">
                        <i class="iconsminds-box-full"></i> Categorias
                    </a>
                </li>
                <li class="{{ route('admin.products') === url()->current()?'active':'' }}">
                    <a href="#products">
                        <i class="iconsminds-box-with-folders"></i> Productos
                    </a>
                </li>
                <li class="{{ route('admin.homeslider') === url()->current()?'active':'' }}">
                    <a href="#sliders">
                        <i class="iconsminds-duplicate-layer"></i> Sliders
                    </a>
                </li>
                <li class="{{ route('admin.ask') === url()->current()?'active':'' }}">
                    <a href="#ask">
                        <i class="iconsminds-big-data"></i> Solicitudes
                    </a>
                </li>

                <li class="{{ route('admin.website') === url()->current()?'active':'' }}">
                    <a href="#settings">
                        <i class="simple-icon-settings"></i> Configuraciones
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
            <ul class="list-unstyled" data-link="dashboard">
                <li>
                    <a href="Dashboard.Analytics.html">
                        <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="Dashboard.Ecommerce.html">
                        <i class="simple-icon-basket-loaded"></i> <span class="d-inline-block">Ecommerce</span>
                    </a>
                </li>

            </ul>
            {{--            --}}
            <ul class="list-unstyled" data-link="categories" id="categories">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseAuthorization" aria-expanded="true"
                       aria-controls="collapseAuthorization" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Categorías</span>
                    </a>
                    <div id="collapseAuthorization" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.categories') }}">
                                    <i class="iconsminds-folder-zip"></i> <span
                                        class="d-inline-block">Administrar</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="modal" data-target="#addModal">
                                    <i class="iconsminds-add"></i> <span
                                        class="d-inline-block">Nuevo</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#Home-categories" aria-expanded="true"
                       aria-controls="Home-categories" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Home Categories</span>
                    </a>
                    <div id="Home-categories" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.homecategories') }}">
                                    <i class="iconsminds-folder-zip"></i> <span
                                        class="d-inline-block">Administrar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="list-unstyled" data-link="products">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#products" aria-expanded="true"
                       aria-controls="products" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Todo Producto</span>
                    </a>
                    <div id="products" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.products') }}">
                                    <i class="iconsminds-folder-zip"></i> <span class="d-inline-block">Administrar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#sale-setting" aria-expanded="true"
                       aria-controls="sale-setting" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Días de ofertas</span>
                    </a>
                    <div id="sale-setting" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.sale') }}">
                                    <i class="iconsminds-folder-zip"></i> <span class="d-inline-block">Ajustes</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#brands" aria-expanded="true"
                       aria-controls="sale-setting" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Marcas de Prodcutos</span>
                    </a>
                    <div id="brands" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.brands') }}">
                                    <i class="iconsminds-folder-zip"></i> <span class="d-inline-block">Administrar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
            <ul class="list-unstyled" data-link="sliders">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#collapseForms" aria-expanded="true"
                       aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Slider</span>
                    </a>
                    <div id="collapseForms" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.homeslider') }}">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Administrar</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="list-unstyled" data-link="ask">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#asks" aria-expanded="true"
                       aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Pedidos de Compra</span>
                    </a>
                    <div id="asks" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.ask') }}">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Administrar</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

            <ul class="list-unstyled" data-link="settings">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true"
                       aria-controls="collapseForms" class="rotate-arrow-icon opacity-50">
                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Página</span>
                    </a>
                    <div id="setting" class="collapse show">
                        <ul class="list-unstyled inner-level-menu">
                            <li>
                                <a href="{{ route('admin.website') }}">
                                    <i class="simple-icon-event"></i> <span class="d-inline-block">Administrar</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            </ul>

        </div>
    </div>
</div>
