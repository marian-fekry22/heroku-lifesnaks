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
        'category', 'images','reviews'
    ];
    const ALL_RELATIONS_CONDITIONED = [
        'category', 'orderedImages','activeReviews'
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

    // conditioned relations
    public function activeReviews()
    {
        return $this->reviews()->where('is_active',1);
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
