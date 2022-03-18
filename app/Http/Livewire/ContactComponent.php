<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $mobile;
    public $subject;
    public $message;

    public $frame;

    protected $attributes = [
        'name' => '<b><ins>Nombres</ins></b>',
        'email' => '<b><ins>Correo</ins></b>',
        'mobile' => '<b><ins>Celular</ins></b>',
        'subject' => '<b><ins>Asunto</ins></b>',
        'message' => '<b><ins>Mensaje</ins></b>',
    ];

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'mobile' => 'required|numeric|digits:9',
        'subject' => 'required|min:6',
        'message' => 'required|min:50|max:2000',
    ];

    public function mount()
    {
        $this->frame = 'index';
    }

    public function render()
    {
        $data['title'] = 'Contactanos';

        return view('livewire.contact-component', $data)->layout('layouts.frontend');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function saveData()
    {
        $this->validate($this->rules, [], $this->attributes);
        $data = new Contact();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->mobile = $this->mobile;
        $data->subject = $this->subject;
        $data->message = $this->message;

        if ($data->save()) {
            $this->emit('notification', 'Su mensaje se envió exitosamente');
            $this->cleanItems();
        }
    }

    public function cleanItems()
    {
        $this->name = null;
        $this->email = null;
        $this->mobile = null;
        $this->subject = null;
        $this->message = null;

        $this->resetErrorBag();
        $this->resetValidation();
    }
}
