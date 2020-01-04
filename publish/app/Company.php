<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = ['id'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function ordersProducts(){
        return $this->hasManyThrough(OrderProduct::class, Order::class);
    }

    //validations
    public function validations(){
        return [
            'name' => ['required'],
            'number' => ['numeric']
        ];
    }
}
