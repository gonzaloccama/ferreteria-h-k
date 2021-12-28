<?php

namespace App\Http\Livewire;

use App\Models\AskInformation;
use App\Models\Sale;
use App\Models\SettingSite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    protected $listeners = ['hidden_modal' => 'hidden_modal'];

    public $info_names;
    public $info_email;
    public $info_celular;
    public $info_whatsapp;
    public $info_message;

    public $info_products;
    public $info_subtotal;
    public $info_total;

    public $showModal = false;

    protected $rules = [
        'info_names' => 'required|min:3|max:126',
        'info_email' => 'required|email',
        'info_celular' => 'required|digits:9|numeric',
        'info_whatsapp' => 'digits:9|numeric',
        'info_message' => 'nullable',
    ];

    protected $messages = [
        'info_names.required' => 'El campo <b>nombre</b> es obligatorio.',
        'info_names.min' => 'El campo deber contener como mínimo :min caracteres.',
        'info_names.max' => 'El campo deber contener como máximo :max caracteres.',
        'info_email.required' => 'El <b>email</b> es obligatorio.',
        'info_email.email' => 'El <b>email</b> debe ser una dirección de email válida.',
        'info_celular.required' => 'El <b>número de celular</b> es obligatorio.',
        'info_celular.digits' => 'El <b>número de celular</b> debe ser exactamente de :digits dígitos.',
        'info_celular.numeric' => 'El <b>número de celular</b> debe de tipo numérico.',
        'info_whatsapp.digits' => 'El <b>número de whatsapp</b> debe ser exactamente de :digits dígitos.',
        'info_whatsapp.numeric' => 'El <b>número de whatsapp</b> debe de tipo numérico.',
    ];


    public function render()
    {
        $page['website'] = SettingSite::find(1);
        $page['title'] = 'Carrito de compras';

        $data['sale'] = Sale::find(1);
//        $data['titlePage'] = 'Carrito de compras';

        return view('livewire.cart-component', $data)->layout('layouts.frontend', $page);
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

    public function ask_information()
    {
        $this->validate();

        $askInformation = new AskInformation();

        $askInformation->info_names = $this->info_names;
        $askInformation->info_email = $this->info_email;
        $askInformation->info_celular = $this->info_celular;
        $askInformation->info_whatsapp = $this->info_whatsapp;
        $askInformation->info_message = $this->info_message;
        $askInformation->info_products = $this->info_products;
        $askInformation->info_subtotal = $this->info_subtotal;
        $askInformation->info_total = $this->info_total;

        $askInformation->save();

        $this->showModal = false;
        $this->cleanError();
        $this->emit('closeModal');
        $this->emit('sendAlert');
    }

    public function show_modal()
    {
        $this->emit('cleanError');
        $sale = Sale::find(1);
        $products = [];

//        dd(Cart::instance('cart')->content());

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

        $this->info_names = '';
        $this->info_email = '';
        $this->info_celular = '';
        $this->info_whatsapp = '';
        $this->info_message = '';
        $this->info_products = json_encode($products);
        $this->info_subtotal = str_replace(",", "", Cart::instance('cart')->subtotal());
        $this->info_total = str_replace(",", "", Cart::instance('cart')->total());

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
        $this->info_names = '';
        $this->info_email = '';
        $this->info_celular = '';
        $this->info_message = '';
    }
}
