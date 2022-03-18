<?php

namespace App\Http\Livewire;

use App\Models\AskInformation;
use App\Models\Sale;
use App\Models\SettingSite;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    protected $listeners = ['hidden_modal' => 'hidden_modal'];

    public $names;
    public $email;
    public $phone;
    public $whatsapp;
    public $message;

    public $products;
    public $subtotal;
    public $total;

    public $showModal = false;

    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    protected $rules = [
        'names' => 'required|min:3|max:126',
        'email' => 'required|email',
        'phone' => 'required|digits:9|numeric',
        'whatsapp' => 'digits:9|numeric',
        'message' => 'nullable',
    ];

    protected $messages = [
        'names.required' => 'El campo <b>nombre</b> es obligatorio.',
        'names.min' => 'El campo deber contener como mínimo :min caracteres.',
        'names.max' => 'El campo deber contener como máximo :max caracteres.',
        'email.required' => 'El <b>email</b> es obligatorio.',
        'email.email' => 'El <b>email</b> debe ser una dirección de email válida.',
        'phone.required' => 'El <b>número de celular</b> es obligatorio.',
        'phone.digits' => 'El <b>número de celular</b> debe ser exactamente de :digits dígitos.',
        'phone.numeric' => 'El <b>número de celular</b> debe de tipo numérico.',
        'whatsapp.digits' => 'El <b>número de whatsapp</b> debe ser exactamente de :digits dígitos.',
        'whatsapp.numeric' => 'El <b>número de whatsapp</b> debe de tipo numérico.',
    ];


    public function render()
    {
        $data['title'] = 'Carrito de compras';
        $data['sale'] = Sale::find(1);

        $this->setAmountForCheckout();

        return view('livewire.cart-component', $data)->layout('layouts.frontend');
    }

    public function refreshQuantity($rowId, $action = true)
    {
        $product = Cart::instance('cart')->get($rowId);

        if ($action) {
            $qty = $product->qty + 1;
        } else {
            $qty = ($product->qty > 1) ? ($product->qty - 1) : $product->qty;
        }

        Cart::instance('cart')->update($rowId, $qty);

        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('front-end-ask-modal', 'refreshComponent');
    }

    public function switchToSaveForLater($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emit('saveForLater');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function deleteFromForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emit('deleteCart');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emit('cleanCart');
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function checkout()
    {
        if (Auth::check()) {
            $this->setAmountForCheckout();
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (Cart::instance('cart')->count() > 0) {
            if (session()->has('coupon')) {
                session()->put('checkout', [
                    'discount' => $this->discount,
                    'subtotal' => $this->subtotalAfterDiscount,
                    'tax' => $this->taxAfterDiscount,
                    'total' => $this->totalAfterDiscount,
                ]);
            } else {
                session()->put('checkout', [
                    'discount' => 0,
                    'subtotal' => Cart::instance('cart')->subtotal(),
                    'tax' => Cart::instance('cart')->tax(),
                    'total' => Cart::instance('cart')->total(),
                ]);
            }
        }else{
            session()->forget('checkout');
        }
    }

    public function ask_information()
    {
        $this->validate();

        if (Cart::instance('cart')->count() > 0) {
            $askInformation = new AskInformation();

            $askInformation->names = $this->names;
            $askInformation->email = $this->email;
            $askInformation->phone = $this->phone;
            $askInformation->whatsapp = $this->whatsapp;
            $askInformation->message = $this->message;
            $askInformation->products = $this->products;
            $askInformation->subtotal = $this->subtotal;
            $askInformation->total = $this->total;

            $askInformation->save();

            $this->showModal = false;
            $this->cleanError();
            $this->emit('closeModal');
            $this->emit('sendAlert');
        }
    }

    public function show_modal()
    {
        $this->emit('cleanError');
        $sale = Sale::find(1);
        $products = [];

        if (Cart::instance('cart')->count() > 0) {
            $price_product = null;
            foreach (Cart::instance('cart')->content() as $item) {

                if ($item->model->sale_price > 0 && $sale->status === 1 && $sale->sale_date > Carbon::now()):
                    $price_product = $item->model->sale_price;
                else:
                    $price_product = $item->model->regular_price;
                endif;
                array_push($products, [
                    'id' => $item->model->id,
                    'name' => $item->model->name,
                    'qty' => $item->qty,
                    'price' => $price_product
                ]);
            }
        }

        $this->names = '';
        $this->email = '';
        $this->phone = '';
        $this->whatsapp = '';
        $this->message = '';
        $this->products = json_encode($products);
        $this->subtotal = str_replace(",", "", Cart::instance('cart')->subtotal());
        $this->total = str_replace(",", "", Cart::instance('cart')->total());

        $this->showModal = true;
        $this->emit('openModal');
    }

    public function hidden_modal()
    {
        $this->showModal = false;
        $this->cleanError();
        $this->emit('closeModal');
    }

    public function cleanError()
    {
        $this->names = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }
}
