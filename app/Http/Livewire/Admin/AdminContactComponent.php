<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class AdminContactComponent extends Component
{
    protected $listeners = ['activeConfirm' => 'delete'];

    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $contact;

    public $deleteId;
    public $itemId;

    public $frame;

    public $headers = [
        'id' => 'ID',
        'name' => 'Nombres',
        'email' => 'Correo',
        'mobile' => 'Celular',
        'subject' => 'Asunto',
        'created_at' => 'Recibido',
        'not' => '',
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
        $table = 'contacts';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = Contact::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->paginate($this->limit);

        $data['_title'] = 'Mesajes';

        return view('livewire.admin.admin-contact-component', $data)->layout('layouts.admin');
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

    public function openModal($id)
    {
        $this->itemId = $id;
        $this->frame = 'view';

        if ($this->itemId) {
            $this->contact = Contact::find($this->itemId);
        }

        $this->emit('showModalView');
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function delete()
    {
        $product = Contact::find($this->deleteId);
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
        $this->contact = null;

        $this->deleteId = null;
        $this->itemId = null;
    }
}
