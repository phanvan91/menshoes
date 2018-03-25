<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name','email','phone_number','status'];
    public function order(){
      return $this->hasMany(order::class,'id_cus','id');
    }
}
