<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    protected $listeners = ['locationCatSelected'];

    public $selectCategories = [];
    public $numberOfProducts;

    public function render()
    {
        $data['categories'] = Category::all();
        $data['_title'] = 'Categoías del inicio';

        $this->emit('refreshDropdown');

        return view('livewire.admin.admin-home-category-component', $data)->layout('layouts.admin');
    }

    public function mount()
    {
        $category = HomeCategory::find(1);

        $this->selectCategories = explode(',', $category->sel_categories);
        $this->numberOfProducts = $category->no_of_products;
    }

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selectCategories);
        $category->no_of_products = $this->numberOfProducts;

        $category->save();

        $this->emit('alertSuccess');

    }

}
