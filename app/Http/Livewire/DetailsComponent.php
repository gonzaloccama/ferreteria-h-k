<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SettingSite;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();

        $page['website'] = SettingSite::find(1);
        $page['title'] = $product->name;

        $data = [
            'product' => $product,
            'popular_product' => Product::inRandomOrder()->limit(4)->get(),
            'related_product' => Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get(),
            'sale' => Sale::find(1),
            'titlePage' => 'Detalles',
        ];

        return view('livewire.details-component', $data)->layout('layouts.frontend', $page);
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emit('addCart');
//        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emit('addWishlist');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id === $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function refreshQuantity($action = true)
    {
        if ($action) {
            $this->qty++;
        } else {
            $this->qty > 0 ? $this->qty-- : $this->qty;
        }
    }
}
