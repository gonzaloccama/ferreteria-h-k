<div class="card shadow">
    <div class="card-body">
        <div class="btn-toolbar nav justify-content-end"
             style="  padding: 5px 5px 2px 5px">
            <button type="button" class="btn-close align-self-end" wire:click.prevent="closeFrame"
                    aria-label="Close"></button>
        </div>
        <h4 style="position: absolute; margin-top: -20px; color: #545454; font-weight: 300"> ORDEN N°: {{ $itemId }}</h4>
        <hr>

        <div class="alert alert-primary alert-dismissible fade show rounded mt-0 mb-3" role="alert">
            <strong>FECHA DEL PEDIDO:</strong>
            <span class="">
                {{ Carbon\Carbon::parse($order->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A') }}
            </span>
        </div>

        <div class="card border shadow-none mb-3">
            <div class="card-body">
                <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de la Orden</h6></div>
                <table class="table table-hover clean">
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
            <h5 class="font-weight-semibold color-theme-1 pt-10 mb-4 text-uppercase">Artículos pedidos</h5>
        </div>
        <div class="col-md-12 list">
            <div class="card border shadow-none mb-3">
                <div class="card-body">
                    <div class="mb-4 mt-1"><h6 class="text-uppercase">Productos</h6></div>
                    <div style="overflow-x: auto">
                    <table class="table table-hover clean">
                        <thead class="bg-header">
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
                                    <div class="text-center" style="height: 70px; width: 70px !important;">
                                        <img src="{{ asset($path) . '/' . $item->product->image }}"
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
                                        <a href="javascript:;" wire:click.prevent="openReview('{{ $item->id }}')">Escribir un comentario</a>
                                    </th>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="card border shadow-none mb-3">
                <div class="card-body" style="overflow-x: auto">
                    <div class="list-item-heading mb-4"><h6 class="text-uppercase">Resumen de la Orden</h6></div>
                    <table class="table table-hover clean">
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
                <div class="card-body" style="overflow-x: auto">
                    <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de la orden</h6></div>
                    <table class="table table-hover clean">
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
                    <div class="card-body" style="overflow-x: auto">
                        <div class="list-item-heading mb-4"><h6 class="text-uppercase">Detalles de envio</h6></div>
                        <table class="table table-hover clean">
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

            <div class="card border shadow-none mb-3">
                <div class="card-body">
                    <div class="list-item-heading mb-4"><h6 class="text-uppercase">Transacción</h6></div>
                    <table class="table table-hover clean">
                        <tbody>
                        <tr>
                            <th><p class="color-theme-1 text-uppercase">Modo de transacción: </p></th>
                            <td><h6>{{ $order->transaction->mode }}</h6></td>
                        </tr>

                        <tr>
                            <th><p class="color-theme-1 text-uppercase">Estado: </p></th>
                            <td><h6>{{ $order->transaction->status }}</h6></td>
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
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end p-20">
        <button class="btn btn-secondary btn-sm" wire:click.prevent="closeFrame"><i class="fas fa-arrow-left"></i> Regresar</button>
    </div>
</div>
