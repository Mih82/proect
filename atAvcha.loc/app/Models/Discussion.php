<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function product(){
        return $this->hasOne( 'App\Models\Product' );
    }

    public function user(){
        return $this->hasOne( 'App\Models\User' );
    }

    protected $fillable = [
        'parent_id', 'product_id', 'name', 'text','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
