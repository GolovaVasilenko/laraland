<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Menu extends Model
{
    protected $fillable = ['name'];

    public function menuItems()
    {
        return $this->hasMany(MenuItems::class);
    }

    public static function getMenu($name)
    {
        return self::where('name', $name)
            ->select('menus.name', 'menu_items.*')
            ->join('menu_items', 'menus.id', '=', 'menu_items.menu_id')
            ->where('menu_items.lang', App::getLocale())
            ->first();
    }
}
