<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function colors()
    {
        return $this->hasMany('App\Color');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
