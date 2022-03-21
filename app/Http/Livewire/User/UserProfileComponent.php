<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfileComponent extends Component
{
    use WithFileUploads;

    public $frame;

    public $name;
    public $email;
    public $image;
    public $newimage;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $region;
    public $country;
    public $zipcode;

    public $user;

    protected $attributes = [
        'name' => '<b><ins>Nombre</ins></b>',
        'email' => '<b><ins>Correo Electrónico</ins></b>',

        'newimage' => '<b><ins>Imagen</ins></b>',
        'mobile' => '<b><ins>Celular</ins></b>',
        'line1' => '<b><ins>Dirección 1</ins></b>',
        'line2' => '<b><ins>Dirección 2</ins></b>',
        'city' => '<b><ins>Ciudad</ins></b>',
        'province' => '<b><ins>Provincia</ins></b>',
        'region' => '<b><ins>Región</ins></b>',
        'country' => '<b><ins>País</ins></b>',
        'zipcode' => '<b><ins>Codigo postal</ins></b>',
    ];

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'newimage' => 'nullable|mimes:png,jpg,jpeg|size:480',
        'mobile' => 'nullable|numeric|digits:9',
        'line1' => 'nullable',
        'line2' => 'nullable',
        'city' => 'nullable',
        'province' => 'nullable',
        'region' => 'nullable',
        'country' => 'nullable',
        'zipcode' => 'nullable',
    ];

    public function mount()
    {
        $this->frame = 'index';
        $this->user = User::find(auth()->user()->id);
    }

    public function render()
    {
        if (!Profile::where('user_id', auth()->user()->id)->first()) {
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->save();
        }

        $data['title'] = 'Perfil';

        return view('livewire.user.user-profile-component', $data)->layout('layouts.frontend');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
    }

    public function openEdit()
    {
        $this->frame = 'update';
        $this->user = User::find(auth()->user()->id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->image = $this->user->profile->image;
        $this->mobile = $this->user->profile->mobile;
        $this->line1 = $this->user->profile->line1;
        $this->line2 = $this->user->profile->line2;
        $this->city = $this->user->profile->city;
        $this->province = $this->user->profile->province;
        $this->region = $this->user->profile->region;
        $this->country = $this->user->profile->country;
        $this->zipcode = $this->user->profile->zipcode;
    }


    public function uploadImage()
    {
        if ($this->newimage) {
            $data = User::find(auth()->user()->id);
            if ($this->image) {
                unlink('assets/images/profile/' . $this->image);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('profile', $imageName);
            $data->profile->image = $imageName;
            if ($data->profile->save()) {
                $this->emit('notification', 'Su foto de perfil cargó exitosamente');
            }
        }
    }

    public function updateData()
    {
        $data = User::find(auth()->user()->id);
        $data->name = $this->name;
        $data->save();

        $data->profile->mobile = $this->mobile;
        $data->profile->line1 = $this->line1;
        $data->profile->line2 = $this->line2;
        $data->profile->city = $this->city;
        $data->profile->province = $this->province;
        $data->profile->region = $this->region;
        $data->profile->country = $this->country;
        $data->profile->zipcode = $this->zipcode;
        if ($data->profile->save()) {
            $this->emit('notification', 'Los cambios se actualizaron exitosamente');
        }
    }

    public function goBack()
    {
        $this->frame = 'index';
    }

    public function closeFrame()
    {
        $this->goBack();
        $this->cleanItems();
    }

    public function cleanItems()
    {
    }
}
