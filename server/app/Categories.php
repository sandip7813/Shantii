<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Products;
use App\ProductCategories;

class Categories extends Model
{
    protected $table    = 'categories';

    public function products() {
        return $this->belongsToMany('App\Products', 'product_categories', 'category_id', 'product_id')
                    ->withTimeStamps();
    }

    public function ProductCategories(){
        return $this->hasMany('App\ProductCategories', 'category_id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($category) {
            $category->ProductCategories()->delete();
            return true;
        });
    }
}
