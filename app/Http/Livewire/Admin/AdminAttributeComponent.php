<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAttributeComponent extends Component
{
    protected $listeners = ['activeConfirm' => 'delete'];

    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;
    public $frame;

    public $deleteId;
    public $itemId;

    public $name;

    public $headers = [
        'id' => 'ID',
        'name' => 'Atributo',

        'created_at' => 'Creado',
        'not' => '',
    ];

    protected $attributes = [
        'name' => '<b><ins>Atributo</ins></b>',
    ];

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function mount()
    {
        $this->limit = 8;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';

        $this->frame = null;
    }

    public function render()
    {
        $rFormat = array_diff(array_keys($this->headers), ['not']);
        $findIn = [];
        $table = 'product_attributes';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = ProductAttribute::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);

        $data['_title'] = 'Atributos';

        return view('livewire.admin.admin-attribute-component', $data)->layout('layouts.admin');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
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

    /*** methods dynamic start ***/

    public function openModal($id = 0)
    {
        $this->frame = 'create';
        $this->emit('showModal');
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $data = new ProductAttribute();
        $data->name = $this->name;

        if ($data->save()) {
            $this->closeModal();
            $this->emit('notification', ['Atributo añadido exitosamente']);
        }
    }

    public function edit($id = 0)
    {
        if ($id) {

            $this->itemId = $id;
            $this->frame = 'update';

            $data = ProductAttribute::find($this->itemId);
            $this->name = $data->name;

            $this->emit('showModal');

        }
    }

    public function updateData()
    {
        $this->validate($this->rules, [], $this->attributes);

        $data = ProductAttribute::find($this->itemId);

        $data->name = $this->name;

        if ($data->save()) {
            $this->closeModal();
            $this->emit('notification', ['Atributo actualizado exitosamente']);
        }
    }

    /*** methods dynamic end ***/

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function delete()
    {
        $product = ProductAttribute::find($this->deleteId);
        $product->delete();
    }

    public function closeModal()
    {
        $this->frame = null;
        $this->cleanItems();
        $this->emit('closeModalView');
    }

    public function cleanItems()
    {
        $this->deleteId = null;
        $this->itemId = null;

        $this->name = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
