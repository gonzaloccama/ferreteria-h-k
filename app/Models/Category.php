<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'parent'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }

    public function _parent()
    {
        $this->belongsTo(Category::class, 'parent');
    }
}
