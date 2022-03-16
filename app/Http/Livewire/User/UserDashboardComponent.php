<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $data['is_user'] = true;
        $data['title'] = 'Dashboard';
        return view('livewire.user.user-dashboard-component', $data)->layout('layouts.frontend');
    }
}
