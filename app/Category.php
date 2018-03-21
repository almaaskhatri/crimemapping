<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function crime()
    {
        return $this->hasMany('App\Crime');
    }
    
}
