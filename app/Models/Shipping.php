<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orRegion()
    {
        return $this->belongsTo(Region::class, 'region');
    }
}
