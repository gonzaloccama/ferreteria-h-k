<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Hash;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsersComponent extends Component
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
    public $email;
    public $utype;
    public $password;
    public $confirm_password;

    public $headers = [
        'id' => 'ID',
        'name' => 'Nombres',
        'email' => 'Correo',
        'mobile' => 'Celular',
        'utype' => 'Rol',

        'created_at' => 'Registro',
        'not' => '',
    ];

    protected $attributes = [
        'name' => '<b><ins>Nombres</ins></b>',
        'email' => '<b><ins>Email</ins></b>',
        'utype' => '<b><ins>Rol de usuario</ins></b>',
        'password' => '<b><ins>Contraseña</ins></b>',
        'confirm_password' => '<b><ins>Confirmar contraseña</ins></b>',
    ];

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'utype' => 'required',
        'password' => 'required|alpha_num|min:8',
        'confirm_password' => 'required|same:password',
    ];

    public function mount()
    {
        $this->limit = 8;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';

        $this->utype = 'USR';

        $this->frame = null;
    }

    public function render()
    {

        $rFormat = array_diff(array_keys($this->headers), ['not', 'mobile']);
        $findIn = [];
        $table = 'users';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = User::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })
            ->select($table . '.*')
            ->selectRaw('profiles.mobile')
            ->leftJoin('profiles', 'profiles.user_id', 'users.id')
            ->paginate($this->limit);

        $data['_title'] = 'Usuarios';

        return view('livewire.admin.admin-users-component', $data)->layout('layouts.admin');
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

        $data = new User();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->utype = $this->utype;
        $data->password = Hash::make($this->password);

        if ($data->save()) {
            $this->closeModal();
            $this->emit('notification', ['Usuario creado exitosamente']);
        }
    }

    public function edit($id = 0)
    {
        if ($id) {
            $this->itemId = $id;
            $this->frame = 'update';

            $data = User::find($this->itemId);

            $this->name = $data->name;
            $this->email = $data->email;
            $this->utype = $data->utype;

            $this->emit('showModal');
        }
    }

    public function updateData()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'nullable|email',
            'utype' => 'required',
        ];

        $this->validate($rules, [], $this->attributes);

        $data = User::find($this->itemId);

        $data->name = $this->name;
        $data->email = $this->email;
        $data->utype = $this->utype;

        if ($data->save()) {
            $this->closeModal();
            $this->emit('notification', ['Usuario actualizado exitosamente']);
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
        $product = User::find($this->deleteId);
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
        $this->email = null;
        $this->utype = null;
        $this->password = null;
        $this->confirm_password = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
