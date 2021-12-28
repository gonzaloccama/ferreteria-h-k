<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public $slider_id;
    public $newimage;

    protected $rules = [
        'title' => 'required|min:4',
        'subtitle' => 'required|min:4',
        'price' => 'required|numeric',
        'link' => 'required|required|max:520',
        'newimage' => 'nullable|mimetypes:png,jpeg,jpg',
        'status' => 'required|numeric',
    ];

    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }

    public function mount($slider_id)
    {
        $slider = HomeSlider::where('id', $slider_id)->first();

        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slide_id = $slider->id;
    }

    public function updateSlider()
    {
        $this->validate();

        $slider = HomeSlider::find($this->slider_id);

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders', $imageName);
        }

        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->image = (isset($imageName) && !empty($imageName)) ? $imageName : $slider->image;;
        $slider->status = $this->status;

        $slider->save();
        session()->flash('message', 'Slider has been created successfully');
    }

    public function update($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
}
