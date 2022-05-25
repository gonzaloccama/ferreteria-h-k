<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SettingSite;
use Auth;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public $showQuickView = false;

    public function render()
    {
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);

        $data['title'] = 'Inicio';

        $data['sliders'] = HomeSlider::where('status', 1)->get();
        $data['lproducts'] = Product::orderBy('created_at', 'DESC')->get()->take(10);
        $data['categories'] = Category::whereIn('id', $cats)->get();
        $data['no_of_products'] = $category->no_of_products;
        $data['sproducts'] = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8);
        $data['sale'] = Sale::find(1);
        $data['brands'] = Brand::where('status', '1')->get();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }

        return view('livewire.home-component', $data)->layout('layouts.frontend');/*->layoutData($page);*/
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');

        $this->emitTo('cart-count-component', 'refreshComponent');
        $this->emitTo('cart-count-responsive-component', 'refreshComponent');

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

    public function quickView($id_product)
    {
        $this->emitTo('front-end-modal', 'quickViewsRefresh', $id_product);
        $this->showQuickView = true;
    }

}
