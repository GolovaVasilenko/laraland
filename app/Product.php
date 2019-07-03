<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'image', 'active'];

    public static function getProducts($where = [], $limit = 50) {
        return empty($where) ?
            self::paginate($limit) :
            self::where($where['key'], $where['value'])->paginate($limit)->toArray();
    }

    public static function getProductsFromHomePage($limit = 10)
    {
        return self::limit($limit)->get()->toArray();
    }
}
