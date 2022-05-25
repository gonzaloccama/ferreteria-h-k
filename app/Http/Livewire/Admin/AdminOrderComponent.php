<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPayment;
use App\Models\Transaction;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    protected $listeners = ['activeConfirm' => 'delete'];

    use WithPagination;
    use WithFileUploads;

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

    public $drawTransaction;

    public $tStatus;
    public $opAttachment;
//    public $opAmount;
//    public $opNote;

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

        $this->emit('refresh');

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
                foreach ($order->orderItems as $item) {
                    $item->product->quantity += $item->quantity;
                    $item->product->save();
                }
            }

            if ($order->save()) {
                $this->emit('notification', ['Se cambió el estado correctamente']);
            }
        }
    }

    public function updateTransaction($id, $save = null)
    {
        $dt = Transaction::find($id);

        if ($save) {
            try {
                $dt->status = $this->tStatus;
                if ($dt->save()) {

                    if ($this->tStatus == 'approved') {
                        foreach ($dt->order->orderItems as $item) {
                            $item->product->quantity -= $item->quantity;
                            $item->product->save();
                        }
                    }

                    $orderPay = new OrderPayment();

                    if ($this->opAttachment) {
                        $imageName = Carbon::now()->timestamp . '.' . $this->opAttachment->extension();
                        $this->opAttachment->storeAs('vouchers', $imageName);
                    }

                    $orderPay->transaction_id = $dt->id;
                    $orderPay->order_id = $dt->order->id;
                    if ($this->opAttachment) {
                        $orderPay->attachment = $imageName;
                    }

                    $orderPay->save();


                    $this->emit('notification', ['El estado de transacción actualizada']);
                    $this->closeTransaction();
                }
            }catch (\Exception $e){
            }
        } else {

            $this->tStatus = $dt->status;
            $this->drawTransaction = true;
        }
    }

    public function closeTransaction()
    {
        $this->drawTransaction = null;
        $this->tStatus = null;
        $this->opAttachment = null;

        $this->resetErrorBag();
        $this->resetValidation();
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
        $this->closeTransaction();
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
