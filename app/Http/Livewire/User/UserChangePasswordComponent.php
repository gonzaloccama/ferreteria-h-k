<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $confirm_password;

    public $frame;

    protected $attributes = [
        'current_password' => '<b><ins>Contraseña Actual</ins></b>',
        'password' => '<b><ins>Nueva Contraseña</ins></b>',
        'confirm_password' => '<b><ins>Confirmar Contraseña</ins></b>',
    ];

    protected $rules = [
        'current_password' => 'required',
        'password' => 'required|required|min:6|different:current_password',
        'confirm_password' => 'required|same:password',
    ];

    public function mount()
    {
        $this->frame = 'chang-pwd';
    }

    public function render()
    {
        $data['title'] = 'Cambiar contraseña';

        return view('livewire.user.user-change-password-component', $data)->layout('layouts.frontend');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
        $this->checkPwd();
    }

    public function changPwd()
    {
        $this->validate($this->rules, [], $this->attributes);
        if ($this->checkPwd()) {
            $data = User::findOrFail(auth()->user()->id);
            $data->password = Hash::make($this->password);
            if ($data->save()) {
                $this->emit('notification', 'Su contraseña de actualizó correctamente');
                $this->redirect(route('user.order'));
            }
        }
    }

    private function checkPwd()
    {
        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError(
                'current_password',
                'La <b><ins>Contraseña que ingresó</ins></b> no coincide con la <b><ins>Contraseña actual.</ins></b>'
            );
            return false;
        } else {
            return true;
        }
    }
}
