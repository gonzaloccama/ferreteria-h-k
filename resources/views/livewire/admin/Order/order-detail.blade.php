<div class="modal-body">

    <div class="alert alert-primary alert-dismissible fade show rounded mt-0 mb-3" role="alert">
        <strong>FECHA DE SOLICITUD:</strong>
        <span class="">
            {{ Carbon\Carbon::parse($order->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A') }}
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="card border shadow-none mb-3">
        <div class="card-body">
            <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de la Orden</h6></div>
            <table class="table table-hover responsive">
                <tbody>
                <tr>
                    <th><p class="color-theme-1 text-uppercase">ID de la Orden: </p></th>
                    <td><p>{{ $order->id }}</p></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Fecha de la Orden: </p></th>
                    <td>
                        <p>
                            <?php echo Carbon\Carbon::parse($order->created_at)
                                ->locale('es')
                                ->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A')
                            ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Estado de la orden: </p></th>
                    <td>
                        <p>
                                <span class="rounded-0 badge {{ $order->status }}">
                                   {{ $order->status }}
                                </span>
                        </p>
                    </td>
                </tr>
                @if($order->status == 'canceled')
                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Fecha de cancelación: </p></th>
                        <td>
                            <p>
                                <?php echo Carbon\Carbon::parse($order->canceled_date)
                                    ->locale('es')
                                    ->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A')
                                ?>
                            </p>
                        </td>
                    </tr>
                @else
                    @if($order->status == 'delivered')
                        <tr>
                            <th><p class="color-theme-1 text-uppercase">Fecha de delivery: </p></th>
                            <td>
                                <p>
                                    <?php echo Carbon\Carbon::parse($order->delivered_date)
                                        ->locale('es')
                                        ->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A')
                                    ?>
                                </p>
                            </td>
                        </tr>

                    @elseif($order->status == 'completed')
                        <tr>
                            <th><p class="color-theme-1 text-uppercase">Fecha completado: </p></th>
                            <td>
                                <p>
                                    <?php echo Carbon\Carbon::parse($order->completed_date)
                                        ->locale('es')
                                        ->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A')
                                    ?>
                                </p>
                            </td>
                        </tr>
                    @endif
                @endif

                </tbody>
            </table>
        </div>
    </div>


    <div class="text-center">
        <h5 class="font-weight-semibold color-theme-1 mt-4 mb-4 text-uppercase">Artículos pedidos</h5>
    </div>


    <div class="card border shadow-none mb-3">
        <div class="card-body" style="overflow-x: auto">
            <div class="list-item-heading mb-4"><h6 class="text-uppercase">Productos</h6></div>
            <table class="table table-hover responsive">
                <thead class="thead-light">
                <tr>
                    <th scope="col" class="text-uppercase">Imagen</th>
                    <th scope="col" class="text-uppercase">Producto</th>
                    <th scope="col" class="text-uppercase">Precio</th>
                    <th scope="col" class="text-uppercase">Cantidad</th>
                    <th scope="col" class="text-uppercase">Subtotal</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <th class="align-middle" scope="row">
                            <div class="text-center">
                                <img src="{{ asset($path) . '/' . $item->product->image }}" style="height: 70px;"
                                     class="img-thumbnail" alt="{{ $item->product->image }}">
                            </div>
                        </th>
                        <th class="align-middle" scope="row">
                            <a href="{{ route('product.details', ['slug' => $item->product->slug]) }}"
                               target="_blank">{{ $item->product->name }}</a>
                        </th>
                        <th class="align-middle text-right" scope="row">
                            <p>S/ {{ number_format($item->price, 2, '.', ',') }}</p>
                        </th>
                        <th class="align-middle" scope="row">
                            <p>x{{ $item->quantity }}</p>
                        </th>
                        <th class="align-middle text-right" scope="row">
                            <p>S/ {{ number_format($item->price * $item->quantity, 2, '.', ',') }}</p>
                        </th>
                        @if($order->status == 'delivered' && !$item->rstatus)
                            <th class="align-middle text-right" scope="row">
                                <a href="">Escribir un comentario</a>
                            </th>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card border shadow-none mb-3">
        <div class="card-body" style="overflow-x: auto">
            <div class="list-item-heading mb-4"><h6 class="text-uppercase">Resumen de la Orden</h6></div>
            <table class="table table-hover responsive">
                <tbody>
                <tr>
                    <td><p class="color-theme-1">Subtotal</p></td>
                    <td><p>S/ {{ number_format($order->subtotal, 2, '.', ',') }}</p></td>
                </tr>
                <tr>
                    <td><p class="color-theme-1">IGV</p></td>
                    <td><p>S/ {{ number_format($order->tax, 2, '.', ',') }}</p></td>
                </tr>
                <tr>
                    <td><p class="color-theme-1">Envio</p></td>
                    <td><p>Gratis</p></td>
                </tr>
                <tr>
                    <td><p class="color-theme-1">Total</p></td>
                    <td><h2 class="text-theme-1">S/ {{ number_format($order->total, 2, '.', ',') }}</h2></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card border shadow-none mb-3">
        <div class="card-body">
            <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de la orden</h6></div>
            <table class="table table-hover responsive">
                <tbody>
                <tr>
                    <th><p class="color-theme-1 text-uppercase">Nombres: </p></th>
                    <td><h6>{{ $order->firstname }}</h6></td>
                    <th><p class="color-theme-1 text-uppercase">Apellidos: </p></th>
                    <td><h6>{{ $order->lastname }}</h6></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Email: </p></th>
                    <td><h6>{{ $order->email }}</h6></td>
                    <th><p class="color-theme-1 text-uppercase">Celular: </p></th>
                    <td><h6>{{ $order->mobile }}</h6></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Dirección 1: </p></th>
                    <td><h6>{{ $order->line1 }}</h6></td>
                    <th><p class="color-theme-1 text-uppercase">Dirección 2: </p></th>
                    <td><h6>{{ $order->line2 }}</h6></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Ciudad: </p></th>
                    <td><h6>{{ $order->city }}</h6></td>
                    <th><p class="color-theme-1 text-uppercase">Provincia: </p></th>
                    <td><h6>{{ $order->province }}</h6></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Región: </p></th>
                    <td><h6>{{ $order->orRegion->region }}</h6></td>
                    <th><p class="color-theme-1 text-uppercase">Código Postal: </p></th>
                    <td><h6>{{ $order->zipcode }}</h6></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if($order->is_shipping_different)
        <div class="card border shadow-none mb-3">
            <div class="card-body">
                <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de envio</h6></div>
                <table class="table table-hover responsive">
                    <tbody>
                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Nombres: </p></th>
                        <td><h6>{{ $order->shipping->firstname }}</h6></td>
                        <th><p class="color-theme-1 text-uppercase">Apellidos: </p></th>
                        <td><h6>{{ $order->shipping->lastname }}</h6></td>
                    </tr>

                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Email: </p></th>
                        <td><h6>{{ $order->shipping->email }}</h6></td>
                        <th><p class="color-theme-1 text-uppercase">Celular: </p></th>
                        <td><h6>{{ $order->shipping->mobile }}</h6></td>
                    </tr>

                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Dirección 1: </p></th>
                        <td><h6>{{ $order->shipping->line1 }}</h6></td>
                        <th><p class="color-theme-1 text-uppercase">Dirección 2: </p></th>
                        <td><h6>{{ $order->shipping->line2 }}</h6></td>
                    </tr>

                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Ciudad: </p></th>
                        <td><h6>{{ $order->shipping->city }}</h6></td>
                        <th><p class="color-theme-1 text-uppercase">Provincia: </p></th>
                        <td><h6>{{ $order->shipping->province }}</h6></td>
                    </tr>

                    <tr>
                        <th><p class="color-theme-1 text-uppercase">Región: </p></th>
                        <td><h6>{{ $order->shipping->orRegion->region }}</h6></td>
                        <th><p class="color-theme-1 text-uppercase">Código Postal: </p></th>
                        <td><h6>{{ $order->shipping->zipcode }}</h6></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($drawTransaction)
        <div class="card border shadow mb-3">
            <div class="card-body">
                <div class="position-absolute card-top-buttons">
                    <button class="btn btn-danger icon-button"
                            wire:click.prevent="closeTransaction">
                        <i class="simple-icon-close"></i>
                    </button>
                </div>
                <div class="list-item-heading mb-4"><h6 class="text-uppercase">Editar</h6></div>
                <?php
                $dt = [
                    'name' => 'tStatus',
                    'text' => 'Estado de transacción',
                    'required' => 1,
                    'object' => 'array',
                    'options' => [
                        ['id' => 'pending', 'name' => 'Pendiente'],
                        ['id' => 'approved', 'name' => 'Aprobado'],
                        ['id' => 'declined', 'name' => 'Rechazada'],
                        ['id' => 'refunded', 'name' => 'Reintegrada'],
                    ],
                ];
                ?>
                @include('livewire.widgets.admin.form.select-h', $dt)

                <?php
                $dt = [
                    'name' => 'opAttachment',
                    'text' => 'Comprobante',
                    'required' => 0,
                    'type' => 'file',
                ];
                ?>
                @include('livewire.widgets.admin.form.input-h', $dt)

                <div class="text-right">
                    <button class="btn btn-secondary btn-xs"
                            wire:click.prevent="updateTransaction({{ $order->transaction->id }}, true)">
                        <i class="iconsminds-save"></i>
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="card border shadow-none mb-3">
        <div class="card-body">
            <div class="position-absolute card-top-buttons">
                <button class="btn btn-secondary icon-button"
                        wire:click.prevent="updateTransaction({{ $order->transaction->id }})">
                    <i class="simple-icon-note"></i>
                </button>
            </div>
            <div class="list-item-heading mb-4"><h6 class="text-uppercase">Transacción</h6></div>
            <table class="table table-hover responsive">
                <tbody>
                <tr>
                    <?php
                    $mt = [
                        'cash' => 'Dinero Efectivo',
                        'bankTranfer' => 'Transferencia Bancaria',
                        'digitalWallet' => 'Billetera Digital',
                        'checkPayment' => 'Cheque',
                        'card' => 'Tarjeta de Crédito',
                        'paypal' => 'PayPal'
                    ];
                    ?>
                    <th><p class="color-theme-1 text-uppercase">Modo de transacción: </p></th>
                    <td><h6>{{ $mt[$order->transaction->mode] }}</h6></td>
                </tr>

                <tr>
                    <?php
                    $st = [
                        'pending' => 'Pendiente',
                        'approved' => 'Aprobado',
                        'declined' => 'Rechazada',
                        'refunded' => 'Reintegrada',
                    ];
                    ?>
                    <th><p class="color-theme-1 text-uppercase">Estado: </p></th>
                    <td><h6>{{ $st[$order->transaction->status] }}</h6></td>
                </tr>

                <tr>
                    <th><p class="color-theme-1 text-uppercase">Fecha de transacción: </p></th>
                    <td>
                        <h6>
                            {{ Carbon\Carbon::parse($order->transaction->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A') }}
                        </h6>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
