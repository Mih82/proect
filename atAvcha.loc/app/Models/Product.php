<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function category(){
       return $this->belongsToMany('App\Models\Category');
   }

    public function discussions(){
        return $this->hasMany('App\Models\Discussion');
    }

    protected $fillable = [
        'name', 'price', 'description', 'img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

}
