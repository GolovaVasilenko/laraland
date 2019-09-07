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


}
