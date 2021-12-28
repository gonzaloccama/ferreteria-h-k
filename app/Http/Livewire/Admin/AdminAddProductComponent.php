<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;

    protected $rules = [
        'name' => 'required|min:4',
        'slug' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'SKU' => 'required|unique:products',
        'stock_status' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png',
        'quantity' => 'required|numeric',
        'category_id' => 'required|numeric',
    ];

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->sale_price = null;
    }

    public function render()
    {
        $data['categories'] = Category::all();

        $data['pageTitle'] = 'Productos';
        $data['title'] = 'Nuevo producto';

        return view('livewire.admin.admin-add-product-component', $data)->layout('layouts.admin');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function addProduct()
    {
        $this->validate();

        $product = new Product();

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $product->image = $imageName;
        $product->category_id = $this->category_id;

        $product->save();

        $this->emit('refreshDropdown');
        $this->emit('addAlert');

        session()->flash('message', 'Producto creado exitosamente!');

        $this->redirect(route('admin.products'));

    }

    public function update($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
}
