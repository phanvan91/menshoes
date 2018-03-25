<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
  protected $table = 'order';
  protected $fillable = ['name','qty','price','image','id_cus'];
}
