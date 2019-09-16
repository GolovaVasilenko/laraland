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
        $menu = self::getMenu($name)->toArray();
//dd(self::setChildren($menu));
        return self::setChildren($menu);
    }

    private static function setChildren($dataset)
    {
        $tree = [];
        $tmp = [];
        foreach ($dataset as $key => $node) {
            $tmp[$node['parent_id']][$node['id']] = $node;
        }
        $tree = isset($tmp[0]) ? $tmp[0] : [];
        self::generateElement($tree, $tmp);
        //dd($tree);
        return $tree;
    }

    private static function generateElement(&$dataTree, $arrData)
    {
        foreach ($dataTree as $key => $item) {
            if(!isset($item['children'])) {
                $dataTree[$key]['children'] = [];
            }

            if(array_key_exists($key, $arrData)) {
                $dataTree[$key]['children'] = $arrData[$key];
                self::generateElement($dataTree[$key]['children'], $arrData);
            }
        }
    }
}
