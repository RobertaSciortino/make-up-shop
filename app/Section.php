<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function types()
    {
        return $this->hasMany('App\Types');
    }
}
