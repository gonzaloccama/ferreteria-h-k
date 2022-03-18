<div wire:ignore.self class="modal fade" id="viewModal" role="dialog"
     aria-labelledby="viewModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">VER SOLICITUD DE COMPRA</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary alert-dismissible fade show rounded mt-0 mb-3" role="alert">
                    <strong>FECHA DE SOLICITUD:</strong> <span>
                        <?php
                        echo ucfirst(Carbon\Carbon::parse($created_at)
                            ->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A'));
                        ?>
                    </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border border-light">
                            <div class="card-body pt-4 pb-3 d-flex flex-column">
                                <div class="text-center">
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4 text-uppercase">{{ $names }}</h5>
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex flex-column flex-grow-1">
                                    <h5 class="color-theme-1">Correo electrónico</h5>
                                    <p class="text-muted mb-4">
                                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                                    </p>
                                    <h5 class="color-theme-1">Celular</h5>
                                    <p class="text-muted mb-4">
                                        <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                    </p>
                                    @if(isset($whatsapp) && !empty($whatsapp) && $whatsapp != '')
                                        <h5 class="color-theme-1">Whatsapp</h5>
                                        <p class="text-muted mb-4">
                                            <a href="https://api.whatsapp.com/send?phone=51{{ $whatsapp }}&text=Saludos"
                                               target="_blank">51{{ $whatsapp }}</a>
                                        </p>
                                    @endif
                                    <h5 class="color-theme-1">Mensaje</h5>
                                    <p class="text-muted mb-4">{{ $message }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card border border-4">
                            <div class="card-body pt-4 pb-4 d-flex flex-column">
                                <div class="text-center">
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4 text-uppercase">Productos de
                                        la orden</h5>
                                </div>
                                <div class="pt-3 pb-0 d-flex flex-column flex-grow-1">
                                    <div id="accordion">

                                        <div class="border">
                                            <button class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                VER PRODUCTOS
                                            </button>

                                            <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                <table class="table responsive">
                                                    <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cant.</th>
                                                        <th>Precio</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php $order_products = json_decode($products) @endphp
                                                    @foreach($order_products as $product)
                                                        <tr>
                                                            <td>
                                                                <p class="text-muted">{{ $product->name }}</p>
                                                            </td>
                                                            <td>
                                                                <p class="text-muted">{{ $product->qty }}</p>
                                                            </td>
                                                            <td colspan="2">
                                                                <p class="text-muted">S/ {{ $product->price }}</p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3 border border-4">
                            <div class="card-body pt-4 pb-4 d-flex flex-column">
                                <div class="text-center">
                                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4 text-uppercase">Resumen de
                                        la orden</h5>
                                </div>
                                <div class="pl-3 pr-3 pt-3 pb-0 d-flex flex-column flex-grow-1">
                                    <table class="table responsive">
                                        <tbody>

                                        <tr>
                                            <td>
                                                <p class="list-item-heading color-theme-1">Subtotal</p>
                                            </td>
                                            <td>
                                                <p class="list-item-heading">S/ {{ $subtotal }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="list-item-heading color-theme-1">Total</p>
                                            </td>
                                            <td>
                                                <p class="list-item-heading">S/ {{ $total }}</p>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-primary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>


