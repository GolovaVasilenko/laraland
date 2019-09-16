<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function translate()
    {
        return $this->hasOne('App\SectionTranslate');
    }
}
