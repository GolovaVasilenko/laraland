<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionTranslate extends Model
{
    protected $table = 'sections_translate';

    protected $fillable = ['lang', 'data'];
}
