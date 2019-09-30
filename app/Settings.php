<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    public $timestamps = false;

    protected static $types = [
        'text',
        'textarea',
        'checkbox',
        'file',
        'array',
    ];

    protected static $groups = [
        'global',
        'site',
        'other',
    ];

    protected $fillable = [
        'key',
        'value',
        'label',
        'group',
        'type',
        'lang'
    ];

    public static function getTypes()
    {
        return self::$types;
    }

    public static function getGroups()
    {
        return self::$groups;
    }

    public static function checkTranslate()
    {
        return self::where('key', 'translation')->pluck('value')->first();
    }

    public static function getValue($key)
    {
        return self::where('key', $key)->first();
    }
}
