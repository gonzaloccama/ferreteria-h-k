<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $parent;

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required',
    ];

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->parent = $category->parent;
    }

    public function render()
    {
        $data['categories'] = Category::all();
        return view('livewire.admin.admin-edit-category-component', $data)->layout('layouts.base');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateCategory()
    {
        $this->validate();
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->parent = ($this->parent) ? ($this->parent) : null;
        $category->save();
        session()->flash('message', 'Category has been Updated successfully');
        $this->emit('refreshDropdown');
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:6',
            'slug' => 'required|unique:categories',
        ]);
    }
}
