<?php namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;


class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $parent;

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required|unique:categories',
    ];


    public function render()
    {
        $data['categories'] = Category::all();
        return view('livewire.admin.admin-add-category-component', $data)->layout('layouts.admin');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $this->validate();

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->parent = $this->parent;
        $category->save();
        session()->flash('message', 'Category has been created successfully');

        $this->emit('refreshDropdown');
    }

    public function update($fields)
    {
        $this->validateOnly($fields, $this->rules);
    }
}
