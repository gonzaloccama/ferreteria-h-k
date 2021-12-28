<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    protected $listeners = ['activeConfirm' => 'deleteCategory'];

    public $name;
    public $slug;
    public $parent;
    public $category_id;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $deleteId;

    protected $rules = [
        'name' => 'required|min:6',
        'slug' => 'required|unique:categories',
        'parent' => 'nullable'
    ];

    protected $messages = [
        'name.required' => 'El campo <b>nombre</b> es obligatorio.',
        'name.min' => 'El campo <b>nombre</b> debe tener como mínimo :min caracteres.',
        'slug.required' => 'El campo <b>slug</b> es obligatorio.',
        'slug.unique' => 'El campo <b>slug</b> debe contener valor único.',
    ];

    public function mount()
    {
        $this->limit = 5;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $data['allCategories'] = Category::all();

        $data['categories'] = Category::orderBy($this->orderBy, $this->sort)
            ->orWhere('name', 'LIKE', $keyWord)
            ->orWhere('slug', 'LIKE', $keyWord)
            ->orWhere('id', 'LIKE', $keyWord)
            ->paginate($this->limit);

        $data['pageTitle'] = 'Categorías';
        $data['title'] = 'Categorías';

        $this->emit('refreshF');
        $this->emit('refreshDropdown');

        return view('livewire.admin.admin-category-component', $data)->layout('layouts.admin');
    }

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'parent' => $this->parent,
        ]);

        $this->emit('closeModal');
        $this->emit('addAlert');
        $this->cleanError();
    }

    public function edit($id)
    {
        $this->category_id = $id;
        $category = Category::where('id', $this->category_id)->first();

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->parent = $category->parent;

        $this->emit('showModal');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:6',
            'slug' => 'required',
            'parent' => 'nullable'
        ]);

        if ($this->category_id) {
            $record = Category::find($this->category_id);
            $record->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'parent' => $this->parent,
            ]);
            $this->emit('closeModalUpdate');
            $this->emit('editAlert');

            $this->cleanError();
        }
    }

    public function updated($property)
    {
        // Every time a property changes
        // (only `text` for now), validate it
        $this->validateOnly($property);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updatePagination($size = 0)
    {
        $this->limit = $size;
    }

    public function updateOrderBy($field, $sort)
    {
        $this->orderBy = $field;
        $this->sort = $sort;
    }

    public function deleteCategory()
    {
        $category = Category::find($this->deleteId);
        $category->delete();
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }


    public function cleanError()
    {
        $this->resetInput();
        $this->emit('cleanError');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->parent = null;
    }
}
