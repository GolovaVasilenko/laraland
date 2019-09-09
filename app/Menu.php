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
            ->orderBy('menu_items.position', 'asc')
            ->get();
    }

    public static function tree($name)
    {
        $results = [];
        $menu = self::getMenu($name)->toArray();

        foreach($menu as $item) {
            if($item['parent_id'] === null) {
                $results[] = $item;
            }
        }
        foreach($menu as $item) {
            if($item['parent_id'] !== null) {
                $results = self::setChildren($menu, $item, $results);
            }
        }
        return $results;
    }

    public static function setChildren($menu, $child, $results) {
        foreach($menu as $i){
            if($i['id'] == $child['parent_id']) {
                $results[$child['parent_id']]['children'][$child['id']] = $child;
            }
        }
        return $results;
    }
}
