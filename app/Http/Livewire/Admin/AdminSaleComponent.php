<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;

    public function render()
    {
        $data['pageTitle'] = 'Ajustes de dia';
        $data['_title'] = 'Dias de promociones';

        return view('livewire.admin.admin-sale-component', $data)->layout('layouts.admin');
    }

    public function mount()
    {
        $sale = Sale::find(1);
        $this->sale_date = $sale->sale_date;
        $this->status = $sale->status;
    }

    public function updateSale()
    {
        $sale = Sale::find(1);
        $sale->sale_date = $this->sale_date;
        $sale->status = $this->status;

        $sale->save();

        $this->emit('notification', ['Productos en promoción habilitada']);
    }
}
