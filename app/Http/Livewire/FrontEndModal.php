<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class FrontEndModal extends Component
{
    protected $listeners = ['quickViewRefresh' => 'quickViews'];

    public $showModal;

    public $name;

    public function mount()
    {
        $this->showModal = false;

        $this->name = false;
    }

    public function render()
    {
        return view('livewire.front-end-modal');
    }

    public function quickViews($product_id)
    {
        $product = Product::where('id', $product_id)->first();

        $this->showModal = true;
        $this->name = $product->name;

//        $this->emit('showQuickView');

//        dd($product_id);
    }
}
