<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $table = 'menu_items';

    protected $fillable = [
        'menu_id',
        'parent_id',
        'label',
        'link',
        'lang',
        'position'
    ];

    public $timestamps = false;

    /*public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }*/

}
