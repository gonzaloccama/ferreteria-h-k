<?php

namespace App\Http\Livewire;

use App\Models\AskInformation;
use App\Models\Sale;
use Livewire\Component;

class FrontEndAskModal extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $info_names;
    public $info_email;
    public $info_celular;
    public $info_message;
    public $info_products;
    public $info_subtotal;
    public $info_total;

    public function mount()
    {
        $this->info_names = '';
        $this->info_email = '';
        $this->info_celular = '';
        $this->info_message = '';
        $this->info_products = [];
        $this->info_subtotal = 0.00;
        $this->info_total = 0.00;
    }

    public function render()
    {
        $data['sale'] = Sale::find(1);
        return view('livewire.front-end-ask-modal', $data);
    }

    public function store()
    {
        $askInformation = new AskInformation();

        $askInformation->info_names = $this->info_names;
        $askInformation->info_email = $this->info_email;
        $askInformation->info_celular = $this->info_celular;
        $askInformation->info_message = $this->info_message;
        $askInformation->info_products = $this->info_products;
        $askInformation->info_subtotal = $this->info_subtotal;
        $askInformation->info_total = $this->info_total;

        dd($askInformation);
    }

    public function hidden_modal()
    {
        $this->emitTo('cart-component', 'hidden_modal');
    }

}
