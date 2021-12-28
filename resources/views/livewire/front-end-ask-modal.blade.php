<div wire:ignore.self class="modal fade" id="askInformation" tabindex="-1" data-bs-backdrop="static"
     aria-labelledby="askInformationLabel" aria-hidden="true">
    @php
        $_sale = $sale->status === 1 && $sale->sale_date > Carbon\Carbon::now();
    @endphp

    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 0;">
            <div class="modal-header">
                <h5 class="modal-title" id="askInformationLabel">SOLICITAR INFORMACIÓN DE COMPRA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click.prevent="hidden_modal"></button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">


                    <form class="row">

                        <div class="col-md-6">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="names" placeholder="Nombres"
                                       wire:model="info_names">
                                <label for="info_names">NOMBRES</label>
                                @error('info_names') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="email"
                                       placeholder="Correo Electrónico" wire:model="info_email">
                                <label for="email">EMAIL</label>
                            @error('info_email') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="celular" placeholder="Celular"
                                       wire:model="info_celular">
                                <label for="celular">CELULAR</label>
                            @error('info_celular') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="celular" placeholder="Número Whatsapp"
                                       wire:model="info_whatsapp">
                                <label for="celular" class="text-uppercase">Número Whatsapp</label>
                                @error('info_whatsapp') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                            </div>

                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Deja un comentario aqui"
                                          wire:model="info_message"
                                          id="message" style="height: 100px"></textarea>
                                <label for="message">MENSAJE</label>
                            @error('info_message') <span class="error text-danger fst-italic pl-5 mt-1">{!! $message !!}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="border mb-3 p-md-3 p-10 border-radius cart-totals">
                                <div class="heading_s1 mb-2">
                                    <h5>Productos</h5>
                                </div>
                                <div class="table-responsive">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                                <span class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                                            aria-controls="flush-collapseOne">
                                                        VER LISTA
                                                    </button>
                                                </span>

                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                 aria-labelledby="flush-headingOne"
                                                 data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        @if(Cart::instance('cart')->count() > 0)
                                                            @foreach(Cart::instance('cart')->content() as $item)
                                                                <li>- {{ $item->model->name }}</li>
                                                            @endforeach
                                                        @else
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border p-md-3 p-10 border-radius cart-totals">
                                <div class="heading_s1 mb-2">
                                    <h5>Resumen de la orden</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="cart_total_label">SUBTOTAL</td>
                                            <td class="cart_total_amount">
                                                <span
                                                    class="font-lg fw-900 text-brand">S/ {{ Cart::instance('cart')->subtotal() }}</span>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="cart_total_label">TOTAL</td>
                                            <td class="cart_total_amount">
                                                <strong>
                                                    <span
                                                        class="font-xl fw-900 text-brand">S/ {{ Cart::instance('cart')->total() }}</span>

                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" wire:click.prevent="hidden_modal"
                        data-bs-dismiss="modal">Cancelar
                </button>
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="ask_information">Solicitar pedido
                </button>
            </div>
        </div>
    </div>
</div>
