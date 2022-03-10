<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMenu extends Model
{
    use HasFactory;

    protected $table = 'setting_menus';

    protected $fillable = [
        'id',
        'name',
        'menu_icon',
        'route',
        'is_route',
        'page',
        'order',
        'parent',
        'type',
        'section',
    ];

    public function up()
    {
        return $this->belongsTo(SettingMenu::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(SettingMenu::class, 'parent', 'id');
    }
}
