<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    protected $rules = [
        'title' => 'required|min:4',
        'subtitle' => 'required|min:4',
        'price' => 'required|numeric',
        'link' => 'required|required|max:520',
        'image' => 'required|mimes:png,jpg,jpeg',
        'status' => 'required|numeric',
    ];

    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $this->validate();

        $slider = new HomeSlider();

        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imagename);

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->image = $imagename;
        $slider->status = $this->status;

        $slider->save();
        session()->flash('message', 'Slider has been created successfully');
    }

    public function update($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
}
