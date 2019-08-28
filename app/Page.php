<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App;

class Page extends Model
{
    protected $fillable = ['slug'];

    public static function getPageBySlug(Request $request)
    {
        $tmp = trim($request->getRequestUri(), '/');
        $uri = empty($tmp) ? 'home' : $tmp;
        return self::where('slug', $uri)
            ->join('pages_translate', 'pages.id', '=', 'pages_translate.page_id')
            ->where('pages_translate.lang', App::getLocale())->first();
    }

    public static function getAllPages()
    {
        return self::query()
            ->join('pages_translate', 'pages.id', '=', 'pages_translate.page_id')
            ->where('pages_translate.lang', App::getLocale())->get();
    }
}
