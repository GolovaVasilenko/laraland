<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesTranslate extends Model
{
    protected $table = 'pages_translate';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'body',
        'lang',
        'meta_title',
        'meta_description',
    ];
}
