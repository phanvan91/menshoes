<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug'];
    public function product(){
      return $this->hasMany(product::class,'id_cate','id');
    }
}
