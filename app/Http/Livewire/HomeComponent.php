<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SettingSite;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public $showQuickView = false;

    public function render()
    {
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);

        $page['website'] = SettingSite::find(1);
        $page['title'] = 'Inicio';

        $data = [
            'sliders' => HomeSlider::where('status', 1)->get(),
            'lproducts' => Product::orderBy('created_at', 'DESC')->get()->take(10),
            'categories' => Category::whereIn('id', $cats)->get(),
            'no_of_products' => $category->no_of_products,
            'sproducts' => Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(8),
            'sale' => Sale::find(1),
            'brands' => Brand::where('status', '1')->get(),
        ];

        return view('livewire.home-component', $data)->layout('layouts.frontend')->layoutData($page);
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

    public function quickView($id_product)
    {
        $this->emitTo('front-end-modal', 'quickViewsRefresh', $id_product);
        $this->showQuickView = true;
    }

}
