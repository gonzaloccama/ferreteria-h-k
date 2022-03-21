<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DatePeriod;
use DB;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $data['orders'] = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $data['totalSales'] = Order::whereIn('status', ['delivered', 'completed'])->count();
        $data['totalRevenue'] = Order::whereIn('status', ['delivered', 'completed'])->sum('total');
        $data['todaySales'] = Order::whereIn('status', ['delivered', 'completed'])->whereDate('created_at', Carbon::today())->count();
        $data['todayRevenue'] = Order::whereIn('status', ['delivered', 'completed'])->whereDate('created_at', Carbon::today())->sum('total');

        $data['_title'] = 'Dashboard';

        return view('livewire.admin.admin-dashboard-component', $data)->layout('layouts.admin');
    }

    public function allWeek($filter = []): array
    {
        $status = ['delivered', 'completed', 'ordered', 'canceled'];

        $results = \App\Models\Order::whereBetween('created_at', [Carbon::now()->subDays(6)->format('Y-m-d') . " 00:00:00", Carbon::now()->format('Y-m-d') . " 23:59:59"])
            ->whereIn('status', $filter)
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date'),
                DB::raw('count(*) as total')
            ])
            ->keyBy('date')
            ->map(function ($item) {
                $item->date = Carbon::parse($item->date);
                return $item;
            });

        $period = new DatePeriod(Carbon::now()->subDays(6), CarbonInterval::day(), Carbon::now()->addDay());

        $count = array_map(function ($datePeriod) use ($results) {
            $date = $datePeriod->format('Y-m-d');
            return $results->has($date) ? $results->get($date)->total : 0;
        }, iterator_to_array($period));


        $dates = array_map(function ($datePeriod) use ($results) {
            $days = ['Mon' => 'Lun', 'Tue' => 'Mar', 'Wed' => 'Mie', 'Thu' => 'Jue', 'Fri' => 'Vie', 'Sat' => 'Sab', 'Sun' => 'Dom'];
            return $days[$datePeriod->format('D')];
        }, iterator_to_array($period));

        return ['count' => $count, 'dates' => $dates];
    }
}
