<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{

    public function render()
    {
        $data['title'] = 'checkout';

        return view('livewire.checkout-component', $data)->layout('layouts.frontend');
    }
}
