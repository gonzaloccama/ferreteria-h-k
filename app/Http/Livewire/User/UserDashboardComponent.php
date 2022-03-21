<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class UserDashboardComponent extends Component
{
    use WithPagination;

    public $limit;

    public $headers = [
        'id' => 'ID',
        'firstname' => 'Nombres',
        'lastname' => 'Apellidos',
        'mobile' => 'Celular',
        'subtotal' => 'Subtotal',
        'total' => 'Total',
        'province' => 'Provincia',
        'line1' => 'Dirección',
        'created_at' => 'Orden',
    ];

    public function render()
    {
        $data['results'] = Order::orderBy('created_at', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);

        $data['totalCost'] = Order::where('status', '!=', 'canceled')->where('user_id', auth()->user()->id)->sum('total');
        $data['totalPurchase'] = Order::where('status', '!=', 'canceled')->where('user_id', auth()->user()->id)->count();
        $data['totalDelivered'] = Order::where('status', 'delivered')->where('user_id', auth()->user()->id)->count();
        $data['totalCanceled'] = Order::where('status', 'canceled')->where('user_id', auth()->user()->id)->count();

        $data['is_user'] = true;
        $data['title'] = 'Dashboard';
        return view('livewire.user.user-dashboard-component', $data)->layout('layouts.frontend');
    }
}
