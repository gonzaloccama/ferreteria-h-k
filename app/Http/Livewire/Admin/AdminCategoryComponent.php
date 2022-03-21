<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    protected $listeners = ['activeConfirm' => 'deleteItem'];

    public $name;
    public $slug;
    public $parent;
    public $category_id;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $deleteId;

    public $frame = null;

    public $headers = [
        'id' => 'ID',
        'name' => 'Nombres',
        'slug' => 'Slug',
        'parent' => 'Categoria padre',
        'not' => '',
    ];

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

        $rFormat = array_diff(array_keys($this->headers), array('not'));
        $findIn = [];
        $table = 'categories';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = Category::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }

            })
            ->paginate($this->limit);

        $data['_title'] = 'Categorías';

        $this->emit('refreshF');

        return view('livewire.admin.admin-category-component', $data)->layout('layouts.admin');
    }

    public function openModal()
    {
        $this->frame = 'create';
        $this->emit('showModal');
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
        $this->emit('notification', 'La categoría de creó exitosamente');
        $this->cleanError();
    }

    public function edit($id)
    {
        $this->frame = 'update';

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
            $this->emit('closeModal');
            $this->emit('notification', ['La categoría se actualizó exitosamente']);

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

    public function deleteItem()
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
        $this->frame = null;
        $this->resetInput();
        $this->emit('closeModal');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->slug = null;
        $this->parent = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
