<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Auth;
use Cart;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Stripe;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $region;
    public $country;
    public $zipcode;
    public $is_shipping_different;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_region;
    public $s_country;
    public $s_zipcode;

    public $card_number;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public $paymentMode;

    public $frame;

    protected $attributes = [
        'firstname' => '<b><ins>Nombres</ins></b>',
        'lastname' => '<b><ins>Apellidos</ins></b>',
        'mobile' => '<b><ins>Celular</ins></b>',
        'email' => '<b><ins>Correo electrónico</ins></b>',
        'line1' => '<b><ins>Dirección</ins></b>',
        'city' => '<b><ins>Ciudad</ins></b>',
        'province' => '<b><ins>Provincia</ins></b>',
        'region' => '<b><ins>Departamento</ins></b>',
        'country' => '<b><ins>Pais</ins></b>',
        'zipcode' => '<b><ins>Código postal</ins></b>',

        's_firstname' => '<b><ins>Nombres</ins></b>',
        's_lastname' => '<b><ins>Apellidos</ins></b>',
        's_mobile' => '<b><ins>Celular</ins></b>',
        's_email' => '<b><ins>Correo electrónico</ins></b>',
        's_line1' => '<b><ins>Dirección</ins></b>',
        's_city' => '<b><ins>Ciudad</ins></b>',
        's_province' => '<b><ins>Provincia</ins></b>',
        's_region' => '<b><ins>Departamento</ins></b>',
        's_country' => '<b><ins>Pais</ins></b>',
        's_zipcode' => '<b><ins>Código postal</ins></b>',

        'paymentMode' => '<b><ins>Modo de pago</ins></b>',
    ];

    protected $rules = [
        'firstname' => 'required|min:3',
        'lastname' => 'required|min:3',
        'mobile' => 'required|numeric|digits:9',
        'email' => 'required|email|',
        'line1' => 'required',
        'city' => 'required',
        'province' => 'required',
        'region' => 'required',
        'country' => 'required',
        'zipcode' => 'required',

        'paymentMode' => 'required',
    ];

    protected $cardRules = [
        'card_number' => 'required|numeric|digits:16',
        'exp_month' => 'required|numeric',
        'exp_year' => 'required|numeric',
        'cvc' => 'required|numeric',
    ];

    protected $shippingRules = [
        's_firstname' => 'required|min:3',
        's_lastname' => 'required|min:3',
        's_mobile' => 'required|numeric|digits:9',
        's_email' => 'required|email|',
        's_line1' => 'required',
        's_city' => 'required',
        's_province' => 'required',
        's_region' => 'required',
        's_country' => 'required',
        's_zipcode' => 'required',
    ];

    public function mount()
    {
        $this->is_shipping_different = 0;
        $this->paymentMode = 'cash';

        $this->country = $this->s_country = 'Perú';

        $this->frame = 1;

        $this->verifyCheckout();
    }

    public function render()
    {
        $data['title'] = 'checkout';

        $this->emit('freshComponent');

        return view('livewire.checkout-component', $data)->layout('layouts.frontend');
    }

    public function verifyCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif (session()->get('checkout')['total'] == .0) {
            return redirect()->route('product.cart');
        }
    }

    public function updated($property)
    {
        $this->validateOnly($property, array_merge($this->rules, $this->shippingRules, $this->cardRules), [], $this->attributes);
    }

    public function updatePayment($mode)
    {
        $this->paymentMode = $mode;
    }

    public function placeOrder()
    {
        if ($this->is_shipping_different) {
            $this->validateFields(['shipping']);
        } elseif ($this->paymentMode == 'card' && $this->is_shipping_different) {
            $this->validateFields(['shipping', 'card']);
        } elseif ($this->paymentMode == 'card') {
            $this->validateFields(['card']);
        } else {
            $this->validateFields([]);
        }

//        dd(session()->get('checkout'));

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->subtotal = (double)filter_var(session()->get('checkout')['subtotal'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $order->discount = (double)filter_var(session()->get('checkout')['discount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $order->tax = (double)filter_var(session()->get('checkout')['tax'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $order->total = (double)filter_var(session()->get('checkout')['total'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->region = $this->region;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;

        $order->is_shipping_different = $this->is_shipping_different ? 1 : 0;
        $order->status = 'ordered';

        if ($order->save()) {
            foreach (Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->save();
            }
            $this->emit('alertSave', 'LA ORDEN');
        }

        if ($this->is_shipping_different) {
            $this->validate($this->shippingRules, [], $this->attributes);

            $shipping = new Shipping();

            $shipping->order_id = $order->id;

            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->region = $this->s_region;
            $shipping->country = $this->s_country;
            $shipping->zipcode = $this->s_zipcode;

            $shipping->save();
        }

        if (in_array($this->paymentMode, ['bankTranfer', 'digitalWallet'])) {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } elseif ($this->paymentMode == 'card') {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_number,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc,
                    ],
                ]);

                if (!isset($token['id']) && empty($token['id'])) {
                    session()->flash('stripe_error', '¡El token de Stripe no se generó correctamente!');
                    $this->frame = 1;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->firstname . ' ' . $this->lastname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->region,
                        'country' => $this->country,
                    ],
                    'shipping' => [
                        'name' => $this->firstname . ' ' . $this->lastname,
                        'address' => [
                            'line1' => $this->s_line1,
                            'postal_code' => $this->s_zipcode,
                            'city' => $this->s_city,
                            'state' => $this->s_region,
                            'country' => $this->s_country,
                        ],
                    ],
                    'source' => $token['id'],
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'PEN',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order number ' . $order->id,
                ]);

                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Error en Transacción');
                    $this->frame = 1;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->frame = 1;
            }
        }

        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('cart-count-responsive-component', 'refreshComponent');
    }

    private function validateFields($mode = null)
    {
        if (in_array('shipping', $mode)) {
            $this->validate(
                array_merge($this->rules, $this->shippingRules),
                [],
                $this->attributes
            );
        } elseif (in_array(['shipping', 'card'], $mode)) {
            $this->validate(
                array_merge($this->rules, $this->shippingRules, $this->cardRules),
                [],
                $this->attributes
            );
        } elseif (in_array('card', $mode)) {
            $this->validate(array_merge($this->rules, $this->cardRules), [], $this->attributes);
        } else {
            $this->validate($this->rules, [], $this->attributes);
        }
    }

    private function resetCart()
    {
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        $this->frame = 0;
    }

    private function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();

        $transaction->user_id = auth()->user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentMode;
        $transaction->status = $status;

        $transaction->save();
    }
}
