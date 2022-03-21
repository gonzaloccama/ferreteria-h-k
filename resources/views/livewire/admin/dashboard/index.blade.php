<?php
$summaries = [
    (object)['icon' => 'money-bag', 'title' => 'Ingresos Totales', 'amount' => 'S/ ' . number_format($totalRevenue, 2, '.', ',')],
    (object)['icon' => 'shopping-bag', 'title' => 'Ventas Totales', 'amount' => number_format($totalSales, 0, '', ',')],
    (object)['icon' => 'money-bag', 'title' => 'Ingresos de Hoy', 'amount' => 'S/ ' . number_format($todayRevenue, 2, '.', ',')],
    (object)['icon' => 'bag-quantity', 'title' => 'Ventas de Hoy', 'amount' => number_format($todaySales, 0, '', ',')],
];
?>
<div class="col-md-12">
    <div class="icon-cards-row">
        <div class="glide dashboard-numbers">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach($summaries as $summary)
                        <li class="glide__slide">
                            <a href="javascript:;" class="card">
                                <div class="card-body text-center">
                                    <i class="iconsminds-{{ $summary->icon }}" style="font-size: 36px !important;"></i>
                                    <p class="card-text mb-0">{{ $summary->title }}</p>
                                    <p class="lead text-center">{{ $summary->amount }}</p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6 mb-4">
    <div class="card">
        <div class="position-absolute card-top-buttons">

            <button class="btn btn-header-light icon-button" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="simple-icon-refresh"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">
                <a class="dropdown-item" href="#">Ventas</a>
            </div>

        </div>

        <div class="card-body">
            <div id="data-days" hidden="hidden">
                {{ json_encode($this->allWeek(['delivered', 'completed'])['dates']) }}
            </div>

            <div id="data-sales" hidden="hidden">
                {{ json_encode($this->allWeek(['delivered', 'completed'])['count']) }}
            </div>
            <h5 class="card-title">Ventas</h5>
            <div class="dashboard-line-chart chart">
                <canvas id="salesGraphic"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6 mb-4">
    <div class="card">
        <div class="position-absolute card-top-buttons">

            <button class="btn btn-header-light icon-button" type="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="simple-icon-refresh"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-right mt-3">

                <a class="dropdown-item" href="#">Ordenes</a>

            </div>

        </div>

        <div class="card-body">
            <div id="order-days" hidden="hidden">
                {{ json_encode($this->allWeek(['ordered'])['dates']) }}
            </div>

            <div id="order-sales" hidden="hidden">
                {{ json_encode($this->allWeek(['ordered'])['count']) }}
            </div>
            <h5 class="card-title">Ordenes pendientes</h5>
            <div class="dashboard-line-chart chart">
                <canvas id="orderGraphic"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-lg-12 mb-4">
    <div class="card">
        <div class="position-absolute card-top-buttons">
            <button class="btn btn-header-light icon-button">
                <i class="simple-icon-refresh"></i>
            </button>
        </div>
        <div class="card-body">
            <h5 class="card-title">Órdenes Recientes</h5>
            <div class="scroll dashboard-list-with-thumbs">
                @foreach($orders as $order)
                    {{--                    {{ $order->orderItems[0]->product->name }}--}}
                    <div class="d-flex flex-row mb-3">
                        <a class="d-block position-relative" href="#">
                            <img
                                src="{{ asset('assets/images/products/') . '/' . $order->orderItems[0]->product->image }}"
                                alt="{{ $order->orderItems[0]->product->name }}" class="list-thumbnail border-0"/>
                            <span
                                class="badge badge-pill badge-theme-2 position-absolute badge-top-right text-uppercase">
                                {{ $order->status }}
                            </span>
                        </a>
                        <div class="pl-3 pt-2 pr-2 pb-2">
                            <a href="#">
                                <p class="list-item-heading">
                                    <abbr>{{ __('Orden: '). $order->id }}</abbr>;
                                    {{ ucfirst($order->orderItems[0]->product->name) }}
                                </p>
                                <div class="pr-4 d-none d-sm-block">
                                    <p class="text-muted mb-1 text-small">
                                        {{ $order->line1.', '.$order->city.', '.$order->orRegion->region.', '.$order->country }}
                                    </p>
                                </div>
                                <div class="text-primary text-small font-weight-medium d-none d-sm-block">
                                    <?php
                                    echo ucfirst(Carbon\Carbon::parse($order->created_at)
                                        ->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A'));
                                    ?>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
