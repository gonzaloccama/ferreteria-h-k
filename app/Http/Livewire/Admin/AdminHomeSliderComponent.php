<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

//use DataTables;

class AdminHomeSliderComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $listeners = ['activeConfirm' => 'deleteSlider'];

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public $orderBy;
    public $sort;
    public $limit;
    public $keyWord;
    public $modeUpdate;

    public $deleteId;

    public $slider_id;
    public $image_edit;
    public $newimage;

    protected $rules = [
        'title' => 'required|min:12|max:126',
        'subtitle' => 'required|min:12|max:126',
        'price' => 'required|numeric',
        'link' => 'required|max:520',
        'image' => 'required|mimes:jpeg,jpg,png|max:1024',
        'status' => 'nullable|numeric',
    ];

    protected $messages = [
        'title.required' => 'El campo <b>título</b> es obligatorio.',
        'title.min' => 'El campo deber contener como mínimo :min caracteres.',
        'title.max' => 'El campo deber contener como máximo :max caracteres.',
        'subtitle.required' => 'El campo <b>sub-título</b> es obligatorio.',
        'subtitle.min' => 'El campo deber contener como mínimo :min caracteres.',
        'subtitle.max' => 'El campo deber contener como máximo :max caracteres.',
        'price.required' => 'El campo <b>precio</b> es obligatorio.',
        'price.numeric' => 'El campo <b>precio</b> debe ser solo numérico.',
        'link.required' => 'El campo <b>link</b> es obligatorio.',
        'link.max' => 'El campo deber contener como máximo :max caracteres.',
        'image.required' => 'El campo <b>imagen</b> es obligatorio.',
        'image.mimes' => 'La <b>imagen</b> debe ser un archivo de tipo :values.',
        'image.max' => 'La <b>imagen</b> no debe ser mayor :max kilobytes.',
        'newimage.required' => 'El campo <b>imagen</b> es obligatorio.',
        'newimage.mimes' => 'El <b>imagen</b> debe ser un archivo de tipo :values.',
        'newimage.max' => 'El <b>imagen</b> no debe ser mayor :max kilobytes.',
        'status.numeric' => 'El campo <b>estado</b> debe ser solo numérico.',
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

        $data['sliders'] = HomeSlider::orderBy($this->orderBy, $this->sort)
            ->orWhere('id', 'LIKE', $keyWord)
            ->orWhere('title', 'LIKE', $keyWord)
            ->orWhere('subtitle', 'LIKE', $keyWord)
            ->orWhere('price', 'LIKE', $keyWord)
            ->orWhere('link', 'LIKE', $keyWord)
            ->orWhere('status', 'LIKE', $keyWord)
            ->orWhere('created_at', 'LIKE', $keyWord)
            ->paginate($this->limit);

        $data['pageTitle'] = 'Home Slider';
        $data['_title'] = 'Home Sliders';

        $this->emit('refreshF');

        return view('livewire.admin.admin-home-slider-component', $data)->layout('layouts.admin');
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

        $homeSlider = new HomeSlider();

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imageName);

        $homeSlider->title = $this->title;
        $homeSlider->subtitle = $this->subtitle;
        $homeSlider->price = $this->price;
        $homeSlider->link = $this->link;
        $homeSlider->image = $imageName;
        $homeSlider->status = $this->status;

        $homeSlider->save();

        $this->emit('closeModal');
        $this->emit('addAlert');
        $this->cleanError();
    }

    public function edit($id)
    {
        $this->modeUpdate = 'update';

        $this->slider_id = $id;
        $slider = HomeSlider::where('id', $this->slider_id)->first();

        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->status = $slider->status;
        $this->image_edit = $slider->image;
        $this->slider_id = $slider->id;

        $this->emit('showModalEdit');
        $this->emit('cleanError');
    }

    public function updateSlider()
    {

        $this->validate([
            'title' => 'required|min:12|max:126',
            'subtitle' => 'required|min:12|max:126',
            'price' => 'required|numeric',
            'link' => 'required|max:520',
            'newimage' => 'nullable|mimes:jpeg,jpg,png|max:1024',
            'status' => 'nullable|numeric',
        ]);


        if ($this->slider_id) {

            $homeSlider = HomeSlider::find($this->slider_id);

            if ($this->newimage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('sliders', $imageName);
            }

            if (isset($imageName) && !empty($imageName)) {
                $this->deleteImage('./assets/images/sliders/', $homeSlider->image);
            }

            $homeSlider->title = $this->title;
            $homeSlider->subtitle = $this->subtitle;
            $homeSlider->price = $this->price;
            $homeSlider->link = $this->link;
            $homeSlider->status = $this->status;
            $homeSlider->image = (isset($imageName) && !empty($imageName)) ? $imageName : $homeSlider->image;

            $homeSlider->save();

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
        $this->title = null;
        $this->subtitle = null;
        $this->price = null;
        $this->link = null;
        $this->image = null;
        $this->newimage = null;
        $this->status = 0;
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function deleteSlider()
    {
        $product = HomeSlider::find($this->deleteId);
        $product->delete();
    }

    public function deleteImage($route, $name_file)
    {
        File::delete([
            public_path($route . '/' . $name_file),
        ]);

    }
}
