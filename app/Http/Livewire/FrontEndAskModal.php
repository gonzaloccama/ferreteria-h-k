<?php

namespace App\Http\Livewire;

use App\Models\AskInformation;
use App\Models\Sale;
use Livewire\Component;

class FrontEndAskModal extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $names;
    public $email;
    public $celular;
    public $message;
    public $products;
    public $subtotal;
    public $total;

    public function mount()
    {
        $this->names = '';
        $this->email = '';
        $this->celular = '';
        $this->message = '';
        $this->products = [];
        $this->subtotal = 0.00;
        $this->total = 0.00;
    }

    public function render()
    {
        $data['sale'] = Sale::find(1);
        return view('livewire.frontend.front-end-ask-modal', $data);
    }

    public function store()
    {
        $askInformation = new AskInformation();

        $askInformation->names = $this->names;
        $askInformation->email = $this->email;
        $askInformation->celular = $this->celular;
        $askInformation->message = $this->message;
        $askInformation->products = $this->products;
        $askInformation->subtotal = $this->subtotal;
        $askInformation->total = $this->total;

        dd($askInformation);
    }

    public function hidden_modal()
    {
        $this->emitTo('cart-component', 'hidden_modal');
    }

}
