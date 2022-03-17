<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserOrderComponent extends Component
{
    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;

    public $frame;
    public $path;

    public $rating;
    public $comment;
    public $order_item_id;

    public $itemId;
    public $deleteId;

    public $order;
    public $review;

    protected $attributes = [
        'rating' => '<b><ins>Rating</ins></b>',
        'comment' => '<b><ins>Comentario</ins></b>',
    ];

    protected $rules = [
        'rating' => 'required',
        'comment' => 'required',
    ];

    public $headers = [
        'id' => 'ID',
        'fullname' => 'Nombres',
        'mobile' => 'Celular',
        'email' => 'Correo',
        'total' => 'Total',
        'status' => 'Estado',
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
        $rFormat = array_diff(array_keys($this->headers), array('not', 'fullname', 'created_at'));
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
            ->where('user_id', auth()->user()->id)
            ->select($table . '.*')
            ->selectRaw('CONCAT(firstname," ",lastname) as fullname')
            ->paginate($this->limit);

        $data['is_user'] = true;
        $data['title'] = 'Ordenes';

        return view('livewire.user.user-order-component', $data)->layout('layouts.frontend');
    }

    public function updated($property)
    {
        $this->validateOnly($property, $this->rules, [], $this->attributes);
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

    public function openView($id)
    {
        $this->itemId = $id;
        $this->frame = 'view';

        if ($this->itemId) {
            $this->order = Order::where('user_id', auth()->user()->id)->where('id', $this->itemId)->first();
        }
    }

    public function openReview($id)
    {
        if ($this->order_item_id = $id) {
            $this->frame = 'review';
            $this->review = OrderItem::find($this->order_item_id);
        }
    }

    public function addReview()
    {
        $this->validate($this->rules, [], $this->attributes);

        $data = new Review();
        $data->rating = $this->rating;
        $data->comment = $this->comment;
        $data->order_item_id = $this->order_item_id;

        if ($data->save()) {
            $orderItem = OrderItem::find($this->order_item_id);

            $orderItem->rstatus = true;
            $orderItem->save();

            $this->goBack();
            $this->emit('cancelAlert', 'Valoración enviada exitosament');
        }
    }

    public function canceled($id)
    {
        if ($id) {
            $order = Order::find($id);

            if (!in_array($order->status, ['completed', 'canceled'])) {
                $order->status = 'canceled';
                $order->canceled_date = DB::raw('CURRENT_DATE');

                if ($order->save()) {
                    $this->emit('cancelAlert', 'Orden cancelada exitosamente');
                }
            }
        }
    }

    public function goBack()
    {
        $this->frame = 'view';
        $this->rating = null;
        $this->comment = null;
        $this->order_item_id = null;
    }

    public function closeFrame()
    {
        $this->goBack();
        $this->cleanItems();
    }

    public function cleanItems()
    {
        $this->frame = null;

        $this->itemId = null;
        $this->deleteId = null;
        $this->order = null;
    }
}
