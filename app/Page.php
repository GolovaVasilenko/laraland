<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'body'];

    public static function getPageBySlug(Request $request)
    {
        $tmp = trim($request->getRequestUri(), '/');
        $uri = empty($tmp) ? 'home' : $tmp;
        return self::where('slug', $uri)->first();
    }
}
