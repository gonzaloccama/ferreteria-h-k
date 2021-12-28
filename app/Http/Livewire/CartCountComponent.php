<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartCountComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.cart-count-component');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');

        session()->flash('success_message', 'Item has been save for later!');
    }
}

