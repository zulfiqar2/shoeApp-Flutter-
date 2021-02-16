<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
        'name','contact','location','city'
    ];

    public function order(){
        return $this->belongsTo('App\Order','id','customer_id');
    }
}
