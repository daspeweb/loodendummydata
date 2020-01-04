<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
}
