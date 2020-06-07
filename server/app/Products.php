<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function categories() {
        return $this->belongsToMany('App\Categories', 'product_categories', 'product_id', 'category_id')
                    ->withTimeStamps();
    }

    public function pictures(){
        return $this->hasMany('App\ProductImages', 'product_id');
    }

    public function ProductCategories(){
        return $this->hasMany('App\ProductCategories', 'product_id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($product) {
            $product->ProductCategories()->delete();
            return true;
        });
    }

}
