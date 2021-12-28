<?php

namespace App\Http\Livewire\Admin;

use App\Models\AskInformation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAskInformationComponent extends Component
{
    use WithPagination;

    protected $listeners = ['activeConfirm' => 'deleteAsk'];

    public $orderBy;
    public $sort;
    public $limit;
    public $keyWord;
    public $modeUpdate;

    public $info_id;

    public $info_names;
    public $info_email;
    public $info_celular;
    public $info_whatsapp;
    public $info_message;
    public $info_products;
    public $info_subtotal;
    public $info_total;
    public $created_at;

    public $deleteId;

    public function mount()
    {
        $this->limit = 5;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';

        $this->modeUpdate = false;
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';

        $data['asks'] = AskInformation::orderBy($this->orderBy, $this->sort)
            ->orWhere('id', 'LIKE', $keyWord)
            ->orWhere('info_names', 'LIKE', $keyWord)
            ->orWhere('info_email', 'LIKE', $keyWord)
            ->orWhere('info_celular', 'LIKE', $keyWord)
            ->orWhere('info_whatsapp', 'LIKE', $keyWord)
            ->orWhere('info_message', 'LIKE', $keyWord)
            ->orWhere('info_products', 'LIKE', $keyWord)
            ->orWhere('info_subtotal', 'LIKE', $keyWord)
            ->orWhere('info_total', 'LIKE', $keyWord)
            ->orWhere('created_at', 'LIKE', $keyWord)
            ->paginate($this->limit);

        $data['pageTitle'] = 'Solicitudes';
        $data['_title'] = 'Solicitudes de compra';

        $this->emit('refreshF');

        return view('livewire.admin.admin-ask-information-component', $data)->layout('layouts.admin');
    }

    public function openModal($id)
    {
        $this->info_id = $id;

        $ask = AskInformation::where('id', $this->info_id)->first();

        $this->info_names = $ask->info_names;
        $this->info_email = $ask->info_email;
        $this->info_celular = $ask->info_celular;
        $this->info_whatsapp = $ask->info_whatsapp;
        $this->info_message = $ask->info_message;
        $this->info_products = $ask->info_products;
        $this->info_subtotal = $ask->info_subtotal;
        $this->info_total = $ask->info_total;
        $this->created_at = Carbon::parse($ask->created_at)->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A');

        $this->modeUpdate = 'view';
        $this->emit('showModalView');
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

    public function closeModal()
    {
        $this->info_names = null;
        $this->info_email = null;
        $this->info_celular = null;
        $this->info_whatsapp = null;
        $this->info_message = null;
        $this->info_products = null;
        $this->info_subtotal = null;
        $this->info_total = null;
        $this->created_at = null;

        $this->modeUpdate = false;
        $this->emit('closeModalView');
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function deleteAsk()
    {
        $product = AskInformation::find($this->deleteId);
        $product->delete();
    }

    public function date_str_($date)
    {
        $date = substr($date, 0, 10);

        $numeroDia = date('d', strtotime($date));
        $dia = date('l', strtotime($date));
        $mes = date('F', strtotime($date));
        $anio = date('Y', strtotime($date));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

        return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
    }
}
