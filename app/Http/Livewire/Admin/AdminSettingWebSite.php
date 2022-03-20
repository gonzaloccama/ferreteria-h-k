<?php

namespace App\Http\Livewire\Admin;

use App\Models\SettingSite;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminSettingWebSite extends Component
{
    use WithFileUploads;

    protected $listeners = ['toRefresh' => '$refresh'];

    public $website;

    public $name;
    public $down_name;
    public $email;
    public $phone;
    public $address;
    public $attention;
    public $postal_code;
    public $logo_dark;
    public $newLogo_dark;

    public $logo_white;
    public $newLogo_white;

    public $media_social = [];

    public $banner_top;
    public $mission;
    public $vision;
    public $abstract;
    public $updated_at;

    protected $messages = [
        'name.required' => 'El <b>nombre del Sitio Web</b> es obligatorio.',
        'name.min' => 'El campo deber contener como mínimo :min caracteres.',

        'down_name.required' => 'El <b>nombre largo del Sitio Web</b> es obligatorio.',
        'down_name.min' => 'El campo deber contener como mínimo :min caracteres.',

        'email.required' => 'El <b>email</b> es obligatorio.',
        'email.email' => 'El <b>email</b> debe ser una dirección de email válida.',

        'phone.required' => 'El <b>número de celular</b> es obligatorio.',
        'phone.digits' => 'El <b>número de celular</b> debe ser exactamente de :digits dígitos.',
        'phone.numeric' => 'El <b>número de celular</b> debe de tipo numérico.',

        'address.required' => 'La <b>dirección</b> es obligatorio.',

        'attention.required' => 'El campo <b>atención</b> es obligatorio.',

        'postal_code.required' => 'El campo <b>código postal</b> es obligatorio.',
        'postal_code.numeric' => 'El campo <b>código postal</b> debe ser solo numérico.',

        'logo_dark.mimes' => 'El <b>logo</b> debe ser un archivo de tipo :values.',
        'logo_dark.max' => 'El <b>logo</b> no debe ser mayor :max kilobytes.',

        'logo_white.mimes' => 'El <b>logo</b> debe ser un archivo de tipo :values.',
        'logo_white.max' => 'El <b>logo</b> no debe ser mayor :max kilobytes.',

    ];

    public function mount()
    {
        $this->generalInformation(false);
        $this->media_social = $this->resetMediaArray();
    }

    public function render()
    {
        $data['titlePage'] = 'WebSite';
        $data['_title'] = 'Configuraciones del WebSite';

        return view('livewire.admin.admin-setting-web-site', $data)->layout('layouts.admin');
    }

    public function generalInformation($save = true)
    {

        $this->emit('cleanSection');
        $setting = SettingSite::find(1);

        if ($save) {

            $this->validate([
                'name' => 'required|min:3',
                'down_name' => 'required|min:3',
                'email' => 'required|email',
                'phone' => 'required|digits:9|numeric',
                'address' => 'required',
                'attention' => 'required',
                'postal_code' => 'required',
                'newLogo_dark' => 'nullable',
            ]);

            if ($this->newLogo_dark) {
                $imageLogo_1 = 'logo.' . $this->newLogo_dark->extension();
                $this->newLogo_dark->storeAs('pages', $imageLogo_1);
            }

            $setting->name = $this->name;
            $setting->down_name = $this->down_name;
            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->address = $this->address;
            $setting->attention = $this->attention;
            $setting->postal_code = $this->postal_code;
            $setting->logo_dark = (isset($imageLogo_1) && !empty($imageLogo_1)) ? $imageLogo_1 : $this->logo_dark;

            $setting->save();

            $this->emit('notification', ['Las configuraciones se han actualizado']);

        } else {

            if ($setting != null) {
                $this->name = $setting->name;
                $this->down_name = $setting->down_name;
                $this->email = $setting->email;
                $this->phone = $setting->phone;
                $this->address = $setting->address;
                $this->attention = $setting->attention;
                $this->postal_code = $setting->postal_code;
                $this->logo_dark = $setting->logo_dark;
                $this->updated_at = $this->_str_date($setting->updated_at);
            } else {
                $this->resetItems();
            }

            $this->website = 'general';
        }

    }

    public function socialMedia($save = true)
    {
        $this->emit('cleanSection');

        $setting = SettingSite::find(1);

        if ($save) {

            $this->validate([
                'media_social' => 'nullable',
            ]);

            $setting->media_social = $this->media_social;
            $setting->save();
            $this->emit('notification', ['Las configuraciones se han actualizado']);

        } else {

            if ($setting->media_social != null) {
                $this->media_social = (array)json_decode($setting->media_social);
                $this->logo_dark = $setting->logo_dark;
                $this->updated_at = $this->_str_date($setting->updated_at);
            } else {
                $this->media_social = $this->resetMediaArray();
            }
            $this->website = 'media';
        }
    }

    public function missionAndVision($save = true)
    {
        $this->emit('cleanSection');

        $setting = SettingSite::find(1);

        if ($save) {

            $this->validate([
                'mission' => 'nullable',
                'vision' => 'nullable',
            ]);

            $setting->mission = $this->mission;
            $setting->vision = $this->vision;

            $setting->save();
            $this->emit('notification', ['Las configuraciones se han actualizado']);

        } else {

            if ($setting != null) {
                $this->mission = $setting->mission;
                $this->vision = $setting->vision;
                $this->logo_dark = $setting->logo_dark;
                $this->updated_at = $this->_str_date($setting->updated_at);
            } else {
                $this->media_social = $this->resetMediaArray();
            }
            $this->website = 'missionAndVision';
        }
    }

    public function bannerTop($save = true)
    {
        $this->emit('cleanSection');

        $setting = SettingSite::find(1);

        if ($save) {

            $this->validate([
                'banner_top' => 'nullable',
            ]);

            $setting->banner_top = $this->banner_top;
            $setting->save();
            $this->emit('notification', ['Las configuraciones se han actualizado']);

        } else {

            if ($setting->banner_top != null) {
                $this->banner_top = (array)json_decode($setting->banner_top);

                $this->logo_dark = $setting->logo_dark;
                $this->updated_at = $this->_str_date($setting->updated_at);
            }
            $this->website = 'bannerTop';
        }
    }

    public function logoSecond($save = true)
    {
        $this->emit('cleanSection');

        $setting = SettingSite::find(1);

        if ($save) {

            $this->validate([
                'newLogo_white' => 'nullable',
            ]);

            if ($this->newLogo_white) {
                $imageLogo_2 = 'logo-white.' . $this->newLogo_white->extension();
                $this->newLogo_white->storeAs('pages', $imageLogo_2);
            }

            $setting->abstract = $this->abstract;

            $setting->logo_white = (isset($imageLogo_2) && !empty($imageLogo_2)) ? $imageLogo_2 : $this->logo_white;
            $setting->save();
            $this->emit('notification', ['Las configuraciones se han actualizado']);

        } else {

            if ($setting->logo_white != null) {
                $this->logo_white = $setting->logo_white;
                $this->abstract = $setting->abstract;

                $this->logo_dark = $setting->logo_dark;
                $this->updated_at = $this->_str_date($setting->updated_at);
            }
            $this->website = 'logoSecond';
        }
    }

//    public function updated($property)
//    {
//        $this->validateOnly($property);
//    }

    public function resetItems()
    {
        $this->name = null;
        $this->down_name = null;
        $this->email = null;
        $this->phone = null;
        $this->address = null;
        $this->attention = null;
        $this->postal_code = null;
        $this->logo_dark = null;
        $this->logo_white = null;
        $this->media_social = $this->resetMediaArray();
        $this->banner_top = [];
        $this->mission = null;
        $this->vision = null;
        $this->abstract = null;
    }

    public function resetMediaArray()
    {
        return [
            'facebook' => '',
            'whatsapp' => '',
            'youtube' => '',
            'twitter' => '',
            'telegram' => '',
            'instagram' => '',
        ];
    }

    public function _str_date($date)
    {
        return Carbon::parse($date)->locale('es')->translatedFormat('l d \d\e F \d\e\l Y g:i:s A');
    }
}
