<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use App\Models\SettingSite;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $page_size;
    public $category_slug;

    use WithPagination;

    public $min_price;
    public $max_price;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->page_size = 12;
        $this->category_slug = $category_slug;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();

        $category_id = $category->id;
        $data['category_name'] = $category->name;

        if ($this->sorting === 'date') {
            $data['products'] = Product::where('category_id', $category_id)
                ->whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('created_at', 'DESC')
                ->paginate($this->page_size);
        } elseif ($this->sorting === 'price') {
            $data['products'] = Product::where('category_id', $category_id)
                ->whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('regular_price', 'ASC')
                ->paginate($this->page_size);
        } elseif ($this->sorting === 'price-desc') {
            $data['products'] = Product::where('category_id', $category_id)
                ->whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('regular_price', 'DESC')
                ->paginate($this->page_size);
        } else {
            $data['products'] = Product::where('category_id', $category_id)
                ->whereBetween('regular_price', [$this->min_price, $this->max_price])
                ->orderBy('name')
                ->paginate($this->page_size);
        }

        $data['title'] = 'Categorias';

        $data['categories'] = Category::all();
        $data['sale'] = Sale::find(1);
        $data['lproducts'] = Product::orderBy('created_at', 'DESC')->get()->take(5);

        return view('livewire.category-component', $data)->layout('layouts.frontend');
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

