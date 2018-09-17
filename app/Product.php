<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Traits\ResourcePageMethods;

    public static function validatorRules()
    {
        return [
            'title' => 'required|string|max:255',
            'parent_id' => 'required',
            'price' => 'required|between:0,999999',
            'old_price' => 'between:0,999999'
        ];
    }

    protected $fillable = [
        'parent_id',
        'published',
        'title',
        'slug',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'text',
        'images'
    ];

    protected $casts = [
        'published' => 'boolean',
        //'images' => 'array'
    ];


    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category');
    }

    public function fullUrl()
    {
        $url = '/' . trim($this->slug, '/');
        $parent = $this->parent;
        if ($parent) {
            $url = $parent->url . $url;
        } else {
            $url = '/' . 'catalog/' . trim($this->slug, '/');
        }

        return $url;
    }


    public function prepared_price() {
        return $this->prepare_price($this->price);
    }

    public function prepared_old_price() {
        return $this->prepare_price($this->old_price);
    }

    public function prepare_price($value){
        if (empty($value))
            return;
        if (strpos($value, ".") !== false) {
            return $value.'&#8381;';
        }
        return $value . '.00&#8381;';
    }

    public function isLiked()
    {
        $products_liked = session()->get('products.liked');
        if (empty($products_liked))
            return false;
        return in_array($this->id, $products_liked);
    }

    public function add_to_liked()
    {
        session()->push('products.liked', $this->id);
    }

    public function remove_from_liked()
    {
        $products_liked = session()->get('products.liked');
        $key = array_search($this->id, $products_liked);
        unset($products_liked[$key]);
        session()->forget('products.liked');
        session()->put('products.liked', $products_liked);
    }

    public static function liked()
    {
        $products_liked = session()->get('products.liked');
        if ($products_liked != null)
            return Product::whereIn('id', $products_liked)->get();
        else
            return [];
    }

}
