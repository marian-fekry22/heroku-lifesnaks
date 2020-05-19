<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\AutomatedScopes;

class Product extends Model
{
    use AutomatedScopes;

    protected $with = ['mainImage'];
    protected $appends = ['main_image_url'];

    const ALL_RELATIONS = [
        'category', 'images','reviews' , 'productDetails'
    ];
    const ALL_RELATIONS_CONDITIONED = [
        'category', 'orderedImages','activeReviews' , 'fiveStarsReviews'
        , 'fourStarsReviews' , 'threeStarsReviews' , 'twoStarsReviews' , 'oneStarsReviews'
    ];

    // base relations
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    public function images()
    {
        return $this->belongsToMany('App\Image');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
    public function productDetails()
    {
        return $this->hasMany('App\ProductDetail');
    }

        // conditioned relations
    public function activeReviews()
    {
        return $this->reviews()->where('is_active',1);
    }
    public function fiveStarsReviews()
    {
        return $this->reviews()->where('is_active',1)->where('rate' , '5');
    }
    public function fourStarsReviews()
    {
        return $this->reviews()->where('is_active',1)->where('rate' , '4');
    }
    public function threeStarsReviews()
    {
        return $this->reviews()->where('is_active',1)->where('rate' , '3');
    }
    public function twoStarsReviews()
    {
        return $this->reviews()->where('is_active',1)->where('rate' , '2');
    }
    public function oneStarsReviews()
    {
        return $this->reviews()->where('is_active',1)->where('rate' , '1');
    }
    public function mainImage()
    {
        return $this->images()->where('order',1);
    }
    public function orderedImages()
    {
        return $this->images()->orderBy('order');
    }

    // Accessors
    public function getMainImageUrlAttribute() {
        return $this->mainImage->first()->url ?? null;
    }
}
