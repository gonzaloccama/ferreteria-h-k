<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $listeners = ['activeConfirm' => 'deleteProduct'];

    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $video_url;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $images;
    public $category_id;
    public $brand_id;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $frame;

    public $deleteId;

    public $product_id;
    public $image_edit;
    public $newimage;
    public $images_edit;
    public $newimages;


    public $headers = [
        'SKU' => 'SKU',
        'name' => 'Producto',
        'regular_price' => 'Precio',
        'sale_price' => 'Percio rebaja',
        'stock_status' => 'Stock',
        'created_at' => 'Fecha de creación',
        'category_id' => 'Categoria',

        'not' => '',
    ];

    protected $rules = [
        'name' => 'required|min:4',
        'slug' => 'required|unique:products',
        'short_description' => 'required',
        'description' => 'required',
        'video_url' => 'nullable|url',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'SKU' => 'required|unique:products',
        'stock_status' => 'required',
        'image' => 'required|mimes:jpeg,jpg,png|max:1024',
        'quantity' => 'required|numeric',
        'category_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'El campo <b>nombre del producto</b> es obligatorio.',
        'name.min' => 'El campo deber contener como mínimo :min caracteres.',
        'slug.required' => 'El campo <b>slug</b> es obligatorio.',
        'slug.unique' => 'El campo <b>slug</b> debe contener valor único.',
        'short_description.required' => 'El campo <b>descripción corta</b> es obligatorio.',
        'description.required' => 'El campo <b>descripción</b> es obligatorio.',
        'video_url.url' => 'El <b>url</b> debe ser una URL válida...',
        'regular_price.required' => 'El campo <b>precio regular</b> es obligatorio.',
        'regular_price.numeric' => 'El campo <b>precio regular</b> debe ser solo numérico.',
        'sale_price.numeric' => 'El campo <b>precio regular</b> debe ser solo numérico.',
        'SKU.required' => 'El campo <b>SKU</b> es obligatorio.',
        'SKU.unique' => 'El campo <b>SKU</b> debe contener valor único.',
        'stock_status.required' => 'El campo <b>STOCK</b> es obligatorio.',
        'image.required' => 'El campo <b>imagen</b> es obligatorio.',
        'image.mimes' => 'El <b>imagen</b> debe ser un archivo de tipo :values.',
        'image.max' => 'El <b>imagen</b> no debe ser mayor :max kilobytes.',

        'newimage.required' => 'El campo <b>imagen</b> es obligatorio.',
        'newimage.mimes' => 'El <b>imagen</b> debe ser un archivo de tipo :values.',
        'newimage.max' => 'El <b>imagen</b> no debe ser mayor :max kilobytes.',

        'quantity.required' => 'El campo <b>cantidad</b> es obligatorio.',
        'quantity.numeric' => 'El campo <b>cantidad</b> debe ser solo numérico.',
        'category_id.required' => 'El campo <b>categoria</b> es obligatorio.',
    ];

    public function mount()
    {
        $this->limit = 8;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';

        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->sale_price = 0;
        $this->video_url = '';

        $this->frame = null;
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $data['categories'] = Category::all();
        $data['products'] = Product::orderBy($this->orderBy, $this->sort)
            ->orWhere('id', 'LIKE', $keyWord)
            ->orWhere('SKU', 'LIKE', $keyWord)
            ->orWhere('name', 'LIKE', $keyWord)
            ->orWhere('regular_price', 'LIKE', $keyWord)
            ->orWhere('sale_price', 'LIKE', $keyWord)
            ->orWhere('stock_status', 'LIKE', $keyWord)
            ->orWhere('created_at', 'LIKE', $keyWord)
            ->orWhere('category_id', 'LIKE', $keyWord)
            ->paginate($this->limit);

        $data['_title'] = 'Productos';

        $this->emit('refresh');

        return view('livewire.admin.admin-product-component', $data)->layout('layouts.admin');
    }

    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }

    /***
     * Begin Dynamics methods
     ***/

    public function openModal()
    {
        $this->SKU = 'KH-' .date('y'). str_pad(Product::next(), 4, '0', STR_PAD_LEFT);

        $this->frame = 'create';
        $this->emit('showModal');
    }

    public function store()
    {
        $this->validate();

        $product = new Product();

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);

        $imagesName = [];

        if ($this->images) {
            foreach ($this->images as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products/gallery/', $imgName);

                $imagesName[] = $imgName;
            }
        }

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->video_url = $this->video_url ? $this->video_url : '';
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price ? $this->sale_price : 0;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured ? $this->featured : 0;
        $product->quantity = $this->quantity;
        $product->image = $imageName;
        $product->images = json_encode($imagesName);
        $product->category_id = $this->category_id;
        $product->brand_id = $this->brand_id;


        $product->save();

        $this->emit('closeModal');
        $this->emit('notification', ['Un producto agregado exitosamente']);
        $this->cleanError();
    }

    public function edit($id)
    {
        $this->frame = 'update';

        $this->product_id = $id;
        $product = Product::where('id', $this->product_id)->first();

        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->video_url = $product->video_url;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image_edit = $product->image;
        $this->images_edit = json_decode($product->images);
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->product_id = $product->id;

        $this->emit('showModal');
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required|min:4',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'newimage' => 'nullable|mimes:jpeg,jpg,png|max:1024',
//            'newimages' => 'nullable|mimes:jpg,jpeg,png|max:1024',
            'quantity' => 'required|numeric',
            'category_id' => 'required',
        ]);

        if ($this->product_id) {

            $product = Product::find($this->product_id);

            if ($this->newimage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('products', $imageName);
                $this->deleteImage('./assets/images/products/', $product->image);
            }

            $imagesName = [];

            if ($this->newimages) {
                foreach ($this->newimages as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('products/gallery/', $imgName);
                    $imagesName[] = $imgName;
                }
                foreach ($this->images_edit as $reimage) {
                    $this->deleteImage('./assets/images/products/gallery/', $reimage);
                }
            }


            $product->name = $this->name;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->video_url = $this->video_url ? $this->video_url : '';
            $product->regular_price = $this->regular_price;
            $product->sale_price = $this->sale_price ? $this->sale_price : 0;
            $product->SKU = $this->SKU;
            $product->stock_status = $this->stock_status;
            $product->featured = $this->featured;
            $product->quantity = $this->quantity;
            $product->image = (isset($imageName) && !empty($imageName)) ? $imageName : $product->image;
            $product->images = (isset($imagesName) && !empty($imagesName)) ? json_encode($imagesName) : $product->images;
            $product->category_id = $this->category_id;
            $product->brand_id = $this->brand_id;

            $product->save();

            $this->emit('closeModal');
            $this->emit('notification', ['El producto fue actualizada exitosamente']);
            $this->cleanError();
        }

    }

    /***
     * End Dynamics methods
     ***/

    public function updatePagination($size = 0)
    {
        $this->limit = $size;
    }

    public function updateOrderBy($field, $sort)
    {
        $this->orderBy = $field;
        $this->sort = $sort;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function deleteProduct()
    {
        $product = Product::find($this->deleteId);
        if ($product->delete()) {
            $this->deleteImage('./assets/images/products/', $product->image);

            if (filled(json_decode($product->images))) {
                foreach (json_decode($product->images) as $img) {
                    if ($img) {
                        $this->deleteImage('./assets/images/products/gallery/', $img);
                    }
                }
            }

        }
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function cleanError()
    {
        $this->resetInput();
        $this->frame = null;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->video_url = null;
        $this->short_description = null;
        $this->description = null;
        $this->description = '';
        $this->regular_price = null;
        $this->sale_price = 0;
        $this->SKU = null;
        $this->stock_status = 'instock';
        $this->featured = 0;
        $this->quantity = null;
        $this->image = null;
        $this->images = null;
        $this->newimage = null;
        $this->category_id = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function deleteImage($path, $name_file)
    {
        File::delete([
            public_path($path . '/' . $name_file),
        ]);
    }
}
