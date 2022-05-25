<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Auth;
use Cart;
use Livewire\Component;
use Livewire\WithPagination;

class BrandComponent extends Component
{
    public $sorting;
    public $page_size;
    public $brand_id;

    use WithPagination;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->page_size = 12;

        if (isset($_GET['brand']) && !empty($_GET['brand'])){
            $this->brand_id = $_GET['brand'];
        }

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function render()
    {
//        $category = Category::where('slug', $this->category_slug)->first();
//
//        $category_id = $category->id;
//        $data['category_name'] = $category->name;


        $data['products'] = Product::where('brand_id', $this->brand_id)
            ->whereBetween('regular_price', [$this->min_price, $this->max_price])
            ->when($this->sorting === 'date', function ($query) {
                $query->orderBy('created_at', 'DESC');
            })->when($this->sorting === 'price', function ($query) {
                $query->orderBy('regular_price', 'ASC');
            })->when($this->sorting === 'price-desc', function ($query) {
                $query->orderBy('regular_price', 'DESC');
            })->when($this->sorting === 'default', function ($query) {
                $query->orderBy('name');
            })
            ->paginate($this->page_size);

        $data['title'] = 'Marcas';

        $data['categories'] = Category::all();
        $data['sale'] = Sale::find(1);
        $data['lproducts'] = Product::orderBy('created_at', 'DESC')->get()->take(5);

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.brand-component', $data)->layout('layouts.frontend');
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        $this->emitTo('cart-count-component', 'refreshComponent');
//        return redirect()->route('product.cart');
        $this->emit('addCart');
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

    public function updatePagination($limit)
    {
        $this->page_size = $limit;
    }

    public function updateSortBy($orderBy)
    {
        $this->sorting = $orderBy;
    }
}
