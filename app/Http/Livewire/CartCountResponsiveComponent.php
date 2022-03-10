<?php

namespace App\Http\Livewire;

use Cart;
use Livewire\Component;

class CartCountResponsiveComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.cart-count-responsive-component');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-responsive-component', 'refreshComponent');

        session()->flash('success_message', 'El artículo ha sido guardado para más tarde!');
    }
}
