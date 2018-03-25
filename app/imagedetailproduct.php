<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagedetailproduct extends Model
{
    protected $table = 'imagedetailproducts';
    protected $fillable = ['image','id_product'];
    public function product(){
      return $this->belongsTo(product::class,'id_product','id');
    }
}
