<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductCategoryHeaderComponent extends Component
{
    public $more_or_less;
    public $limit;

    public function mount()
    {
        $this->more_or_less = 'Ver más';
        $this->limit = 5;
    }

    public function render()
    {
        return view('livewire.product-category-header-component');
    }

    public function changeLimit()
    {
        if ($this->more_or_less == 'Ver más') {
            $this->more_or_less = 'Ver menos';
            $this->limit = 20;
        } else {
            $this->more_or_less = 'Ver más';
            $this->limit = 5;
        }
    }
}
