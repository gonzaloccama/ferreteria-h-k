<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public function mount()
    {
        $this->limit = 8;
        $this->orderBy = 'created_at';
        $this->sort = 'DESC';
        $this->keyWord = '';
    }

    public function render()
    {
        $data['orders'] = Order::orderBy($this->orderBy, $this->sort)->paginate($this->limit);
        $data['_title'] = 'Orden';

        return view('livewire.admin.admin-order-component', $data)->layout('layouts.admin');
    }
}
