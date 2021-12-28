<?php

namespace App\Http\Livewire;

use App\Models\SettingSite;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function render()
    {
//        $data['titlePage'] = 'Lista de deseos';

        $page['website'] = SettingSite::find(1);
        $page['title'] = 'Lista de deseos';

        return view('livewire.wishlist-component')->layout('layouts.frontend', $page);
    }

    public function moveProductFromWishlistToCart($rowId)
    {
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');

        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emit('moveToCart');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id === $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                $this->emit('deleteWishlist');
                return;
            }
        }
    }
}
