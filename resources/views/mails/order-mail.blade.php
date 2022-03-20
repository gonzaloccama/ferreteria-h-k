<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de Orden | {{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<p>Hola {{ $order->firstname }} {{ $order->lastname }}</p>
<p>Su pedido ha sido realizado con éxito.</p>

<table style="width: 600px; text-align: right;">
    <thead>
    <tr>
        <th>Imagen</th>
        <th>Nombres</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->orderItems as $item)
        <tr>
            <td>
                <img src="{{ asset('assets/images/products').'/'.$item->product->image }}" width="100"
                     alt="{{ $item->product->name }}">
            </td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->quantity * $item->price }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3" style="border-top: 1px solid #eee;"></td>
        <td style="font-size: 15px; font-weight: bold; border-top: 1px solid #eee;">Subtotal:
            S/ {{ number_format($order->subtotal, 2, '.', ',') }}
        </td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 15px; font-weight: bold;">IGV: S/ {{ number_format($order->tax, 2, '.', ',') }}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 15px; font-weight: bold;">Envio: {{ __('envio gratis') }}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="font-size: 15px; font-weight: bold;">Total: S/ {{ number_format($order->total, 2, '.', ',') }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
