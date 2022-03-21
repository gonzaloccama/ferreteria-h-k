<?php
$summaries = [
    (object)['icon' => 'money-bag', 'title' => 'Costo total', 'amount' => 'S/ ' . number_format($totalCost, 2, '.', ',')],
    (object)['icon' => 'shopping-bag', 'title' => 'Compra total', 'amount' => number_format($totalPurchase, 0, '', ',')],
    (object)['icon' => 'money-bag', 'title' => 'Total entregada', 'amount' => number_format($totalDelivered, 0, '.', ',')],
    (object)['icon' => 'bag-quantity', 'title' => 'Cancelado total', 'amount' => number_format($totalCanceled, 0, '', ',')],
];
?>
<div class="row align-items-center mt-20">
    @foreach($summaries as $summary)
        <div class="col-md-6 col-lg-3">
            <div class="hero-card box-shadow-outer-3 pl-10 shadow wow fadeIn animated mb-20 hover-up d-flex">
                <div class="hero-card-icon icon-left-7 hover-up ">
                    <i class="iconsminds-{{ $summary->icon }}"></i>
                </div>
                <div class="pl-20 mt-20">
                    <h4 class="mb-5 fw-500 rajdhani">
                        <nobr>{{ $summary->amount }}</nobr>
                    </h4>
                    <p class="font-sm text-grey-5 text-uppercase rajdhani">
                        <nobr>{{ $summary->title }}</nobr>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="col-md-12 list">
    <?php
    $money = ['price', 'total', 'subtotal'];
    $fld = ['not', 'status', 'image',];
    $lnk = ['url', 'mobile', 'phone', 'email', 'whatsapp', 'website']
    ?>
    <div class="card shadow">
        <div class="card-body">

            <div style="overflow-x: auto">
                <table class="table table-hover table-striped clean">
                    <thead class="bg-header">
                    <tr>
                        @foreach($headers as $header)
                            <th class="text-uppercase">{{ $header }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($results as $result)
                        <tr>
                            @foreach(array_keys($headers) as $header)
                                <th class="align-middle" scope="row">

                                        {{ $result[$header] }}

                                </th>
                            @endforeach
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
