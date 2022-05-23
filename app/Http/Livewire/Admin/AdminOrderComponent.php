<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    protected $listeners = ['activeConfirm' => 'delete'];

    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $deleteId;
    public $itemId;

    public $created_at;
    public $frame;
    public $path;

    public $order;



    public $headers = [
        'id' => 'ID',
        'fullname' => 'Nombres',
        'mobile' => 'Celular',
        'email' => 'Correo',
        'total' => 'Total',
        'status' => 'Estado',
        'mode' => 'Pago',
        'tstatus' => 'Est. pago',
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
        $this->path = 'assets/images/products';
    }

    public function render()
    {
        $rFormat = array_diff(array_keys($this->headers), array('not', 'fullname', 'created_at', 'mode', 'tstatus'));
        $findIn = [];
        $table = 'orders';

        foreach ($rFormat as $item) {
            $findIn[] = $table . '.' . $item;
        }

        $data['results'] = Order::orderBy($this->orderBy, $this->sort)
            ->orWhere(function ($query) use ($findIn) {
                foreach ($findIn as $in) {
                    $query->orWhere($in, 'LIKE', '%' . $this->keyWord . '%');
                }
                $query->orWhere(DB::raw("CONCAT(firstname, ' ', lastname)"), 'LIKE', '%' . $this->keyWord . '%');
            })
            ->select($table . '.*')
            ->selectRaw('CONCAT(firstname," ",lastname) as fullname, transactions.mode, transactions.status as tstatus')
            ->join('transactions', 'transactions.order_id', '=', $table . '.id')
            ->paginate($this->limit);

        $data['_title'] = 'Ordenes';

        return view('livewire.admin.admin-order-component', $data)->layout('layouts.admin');
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
            $this->order = Order::find($this->itemId);
        }

        $this->emit('showModal');
    }

    public function updateOrderStatus($id, $status)
    {
        if ($id) {
            $order = Order::find($id);
            $order->status = $status;

            if ($status == 'delivered') {
                $order->delivered_date = DB::raw('CURRENT_DATE');
            } elseif ($status == 'completed') {
                $order->completed_date = DB::raw('CURRENT_DATE');
            } elseif ($status == 'canceled') {
                $order->canceled_date = DB::raw('CURRENT_DATE');
            }

            if ($order->save()) {
                $this->emit('notification', ['Se cambió el estado correctamente']);
            }
        }
    }

    public function deleteConfirm($id)
    {
        $this->deleteId = $id;
        $this->emit('deleteAlert');
    }

    public function delete()
    {
        $product = Order::find($this->deleteId);
        $product->delete();
    }

    public function closeModal()
    {
        $this->frame = null;
        $this->cleanItems();
        $this->emit('closeModal');
    }

    public function cleanItems()
    {
        $this->order = null;

        $this->deleteId = null;
        $this->itemId = null;
        $this->created_at = null;
    }
}
