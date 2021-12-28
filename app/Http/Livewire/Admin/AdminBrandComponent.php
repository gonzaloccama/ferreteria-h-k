<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $listeners = ['activeConfirm' => 'deleteBrand'];

    public $name;
    public $image;
    public $website;
    public $status;

    public $orderBy;
    public $sort;
    public $limit;
    public $keyWord;
    public $modeUpdate;

    public $deleteId;

    public $brand_id;
    public $image_edit;
    public $newimage;

    protected $rules = [
        'name' => 'required|min:2|max:126',
        'image' => 'required|mimes:jpeg,jpg,png|max:1024',
        'website' => 'nullable',
        'status' => 'nullable|numeric',
    ];

    protected $messages = [
        'name.required' => 'El campo <b>nombre</b> es obligatorio.',
        'name.min' => 'El campo deber contener como mínimo :min caracteres.',
        'name.max' => 'El campo deber contener como máximo :max caracteres.',
        'image.required' => 'El campo <b>imagen</b> es obligatorio.',
        'image.mimes' => 'La <b>imagen</b> debe ser un archivo de tipo :values.',
        'image.max' => 'La <b>imagen</b> no debe ser mayor :max kilobytes.',
        'newimage.required' => 'El campo <b>imagen</b> es obligatorio.',
        'newimage.mimes' => 'El <b>imagen</b> debe ser un archivo de tipo :values.',
        'newimage.max' => 'El <b>imagen</b> no debe ser mayor :max kilobytes.',
    ];

    public function mount()
    {
        $this->limit = 5;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';
        $this->modeUpdate = false;

        $this->status = 0;
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $data['brands'] = Brand::orderBy($this->orderBy, $this->sort)
            ->orWhere('id', 'LIKE', $keyWord)
            ->orWhere('name', 'LIKE', $keyWord)
            ->orWhere('image', 'LIKE', $keyWord)
            ->orWhere('website', 'LIKE', $keyWord)
            ->orWhere('status', 'LIKE', $keyWord)
            ->orWhere('created_at', 'LIKE', $keyWord)
            ->paginate($this->limit);

        $data['pageTitle'] = 'Marcas';
        $data['_title'] = 'Marcas de producto';

        return view('livewire.admin.admin-brand-component', $data)->layout('layouts.admin');
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
        $this->modeUpdate = 'create';
        $this->emit('showModalAdd');
        $this->emit('cleanError');
    }

    public function store()
    {
        $this->validate();

        $brand = new Brand();

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('brands', $imageName);

        $brand->name = $this->name;
        $brand->image = $imageName;
        $brand->website = $this->website;
        $brand->status = $this->status;

        $brand->save();

        $this->emit('closeModal');
        $this->emit('addAlert');
        $this->cleanError();
    }

    public function edit($id)
    {
        $this->modeUpdate = 'update';

        $this->brand_id = $id;
        $brand = Brand::where('id', $this->brand_id)->first();

        $this->name = $brand->name;
        $this->image_edit = $brand->image;
        $this->website = $brand->website;
        $this->status = $brand->status;
        $this->brand_id = $brand->id;

        $this->emit('showModalEdit');
        $this->emit('cleanError');
    }

    public function updateBrand()
    {
//        dd($this->slider_id);

        $this->validate([
            'name' => 'required|min:2|max:126',
            'newimage' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'website' => 'nullable',
            'status' => 'nullable|numeric',
        ]);


        if ($this->brand_id) {

            $brand = Brand::find($this->brand_id);

            if ($this->newimage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('brands', $imageName);
            }

            if (isset($imageName) && !empty($imageName)) {
                $this->deleteImage('./assets/images/brands/', $brand->image);
            }

            $brand->name = $this->name;
            $brand->image = (isset($imageName) && !empty($imageName)) ? $imageName : $brand->image;
            $brand->website = $this->website;
            $brand->status = $this->status;

            $brand->save();

            $this->emit('closeModal');
            $this->emit('editAlert');
            $this->cleanError();
        }

    }

    /***
     * end Dynamics methods
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

    public function cleanError()
    {
        $this->resetInput();
        $this->modeUpdate = false;
    }

    private function resetInput()
    {
        $this->name = null;
        $this->image = null;
        $this->website = null;
        $this->status = 0;
        $this->newimage = null;
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function deleteBrand()
    {
        $product = Brand::find($this->deleteId);
        $product->delete();
    }

    public function deleteImage($route, $name_file)
    {
        File::delete([
            public_path($route . '/' . $name_file),
        ]);

    }
}
