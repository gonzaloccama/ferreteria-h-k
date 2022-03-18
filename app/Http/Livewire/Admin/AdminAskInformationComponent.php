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

    public $names;
    public $email;
    public $phone;
    public $whatsapp;
    public $message;
    public $products;
    public $subtotal;
    public $total;
    public $created_at;

    public $deleteId;

    public $headers = [
        'names' => 'Nombres',
        'email' => 'Correo',
        'phone' => 'Celular',
        'whatsapp' => 'WhatsApp',
        'created_at' => 'Recibido',
        'not' => '',
    ];

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
        $rFormat = array_diff(array_keys($this->headers), ['not']);
        $findIn = [];
        $table = 'ask_information';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = AskInformation::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
            })

            ->paginate($this->limit);

        $data['_title'] = 'Solicitudes de compra';

        $this->emit('refreshF');

        return view('livewire.admin.admin-ask-information-component', $data)->layout('layouts.admin');
    }

    public function openModal($id)
    {
        $this->info_id = $id;

        $ask = AskInformation::where('id', $this->info_id)->first();

        $this->names = $ask->names;
        $this->email = $ask->email;
        $this->phone = $ask->phone;
        $this->whatsapp = $ask->whatsapp;
        $this->message = $ask->message;
        $this->products = $ask->products;
        $this->subtotal = $ask->subtotal;
        $this->total = $ask->total;
        $this->created_at = $ask->created_at;

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
        $this->names = null;
        $this->email = null;
        $this->phone = null;
        $this->whatsapp = null;
        $this->message = null;
        $this->products = null;
        $this->subtotal = null;
        $this->total = null;
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
