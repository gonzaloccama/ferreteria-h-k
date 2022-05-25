<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use App\Models\SettingSite;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $sorting;
    public $page_size;

    use WithPagination;

    public $search;
    public $product_cat;
    public $product_cat_id;

    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting = "default";
        $this->page_size = 12;
        $this->fill(request()->only('search', 'product_cat', 'product_cat_id'));

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function render()
    {
        $data['products'] = Product::where('name', 'like', '%' . $this->search . '%')
            ->whereBetween('regular_price', [$this->min_price, $this->max_price])
            ->where('category_id', 'like', '%' . $this->product_cat_id . '%')
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


        $data['categories'] = Category::all();
        $data['lproducts'] = Product::orderBy('created_at', 'DESC')->get()->take(5);
        $data['sale'] = Sale::find(1);

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        $data['title'] = $this->search;

        return view('livewire.search-component', $data)->layout('layouts.frontend');
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
