<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Section extends Model implements HasMedia
{
    use HasMediaTrait;

    public function translate()
    {
        return $this->hasOne('App\SectionTranslate');
    }

    public function page()
    {
        return $this->belongsTo('App\Page');
    }
}
