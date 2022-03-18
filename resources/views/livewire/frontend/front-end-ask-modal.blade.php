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

                            <?php
                            $dt = [
                                'name' => 'names',
                                'text' => 'Nombres',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)


                            <?php
                            $dt = [
                                'name' => 'email',
                                'text' => 'Correo Electrónico',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)

                            <?php
                            $dt = [
                                'name' => 'phone',
                                'text' => 'Celular',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)


                            <?php
                            $dt = [
                                'name' => 'whatsapp',
                                'text' => 'WhatsApp',
                                'required' => 1,
                                'type' => 'text',
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-input', $dt)

                            <?php
                            $dt = [
                                'name' => 'message',
                                'text' => 'Mensaje',
                                'required' => 1,
                            ];
                            ?>
                            @include('livewire.widgets.form.shop-textarea', $dt)

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
                <button type="button" class="btn btn-primary btn-sm" wire:click.prevent="ask_information">Solicitar
                    pedido
                </button>
            </div>
        </div>
    </div>
</div>
