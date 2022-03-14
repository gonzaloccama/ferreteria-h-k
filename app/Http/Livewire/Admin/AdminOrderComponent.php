<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public $limit;
    public $orderBy;
    public $sort;
    public $keyWord;


    public $headers = [
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
    }

    public function render()
    {
        $rFormat = array_diff(array_keys($this->headers), array('not', 'fullname'));
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
            ->selectRaw('CONCAT(firstname," ",lastname) as fullname')
//            ->select('faqs.*')
//            ->selectRaw('faq_sections.faq_section')
//            ->join('faq_sections', 'faq_sections.id', '=', $table . '.faq_section_faq')
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
}
