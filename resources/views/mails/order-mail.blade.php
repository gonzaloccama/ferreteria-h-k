<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de Orden | {{ config('app.name', 'Laravel') }}</title>
    <style>

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .col {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%;
        }

        .text-left {
            text-align: left !important;
        }

        .text-right {
            text-align: right !important;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .m-0 {
            margin: 0 !important;
        }

        .mt-0,
        .my-0 {
            margin-top: 0 !important;
        }

        .p-0 {
            padding: 0 !important;
        }

        .pt-0,
        .py-0 {
            padding-top: 0 !important;
        }

        .pt-4,
        .py-4 {
            padding-top: 1.5rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-white {
            color: #fff !important;
        }

        .bg-white {
            background-color: #fff !important;
        }

        /*# sourceMappingURL=bootstrap.min.css.map */
        #invoice {
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td, .invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty, .invoice table .total, .invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice > div:last-child {
                page-break-before: always
            }
        }
    </style>
</head>
<body>

<!------ Include the above in your HEAD tag ---------->

<div id="invoice">

    <div class="toolbar">
        <p>Hola {{ $order->firstname }} {{ $order->lastname }}</p>
        <p>Su pedido ha sido realizado con éxito.</p>
        <hr class="m-0 p-0">
    </div>
    <div class="invoice overflow-auto pt-0">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="{{ route('home') }}">
                            <img
                                src="https://imgcorp.com/dominate/home/img/img-logo.png" alt="Ferretols"
                                data-holder-rendered="true" class="img-fluid mt-0" style="margin-top: -50px"/>
                        </a>
                    </div>
                    <div class="col company-details pt-4">
                        <h2 class="name">
                            <a target="_blank" href="{{ route('home') }}">
                                {{ $system->name }}
                            </a>
                        </h2>
                        <div>{{ $system->address }}</div>
                        <div>{{ $system->email }}</div>
                        <div>{{ $system->phone }}</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray">FACTURA A:</div>
                        <h2 class="to">{{ $order->firstname }} {{ $order->lastname }}</h2>
                        <div class="address">{{ $order->line1 }}, {{ $order->city }}, {{ $order->province }}
                            - {{ $order->region }}</div>
                        <div class="email"><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">FACTURA Nro 0004556</h1>
                        <div class="date">Fecha de la factura: {{ \Carbon\Carbon::today()->format('d/m/Y') }}</div>
                        {{--                        <div class="date">Due Date: {{ \Carbon\Carbon::today()->format('d/m/Y') }}</div>--}}
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NOMBRES</th>
                        <th class="text-center">PRECIO UNITARIO</th>
                        <th class="text-center">CANTIDAD</th>
                        <th class="text-center">PRECIO TOTAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td class="no text-center">{{ $i++ }}</td>
                            <td class="text-left bg-white">
                                <h3>
                                    <a target="_blank" href="#">
                                        <img src="{{ asset('assets/images/products').'/'.$item->product->image }}"
                                             width="100" class="img-fluid"
                                             alt="{{ $item->product->name }}">
                                        <span style="font-size: 16px !important;">
                                            {{ $item->product->name }}
                                        </span>
                                    </a>
                                </h3>
                            </td>
                            <td class="bg-white">{{ 'S/' . number_format($item->price, 2, '.', ',') }}</td>
                            <td class="bg-white">x{{ $item->quantity }}</td>
                            <td class="total"
                                style="font-size: 16px !important;">{{ 'S/' . number_format($item->quantity * $item->price, 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>S/ {{ number_format($order->subtotal, 2, '.', ',') }}</td>
                    </tr>
                    {{--                    <tr>--}}
                    {{--                        <td colspan="2"></td>--}}
                    {{--                        <td colspan="2">TAX 25%</td>--}}
                    {{--                        <td>$1,300.00</td>--}}
                    {{--                    </tr>--}}
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">TOTAL</td>
                        <td>S/ {{ number_format($order->total, 2, '.', ',') }}</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            {{--            <footer>--}}
            {{--                Invoice was created on a computer and is valid without the signature and seal.--}}
            {{--            </footer>--}}
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

</body>
</html>
