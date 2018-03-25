<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','price','pricesale','des','content','image','id_user','id_cate'];
    public function cate(){
      return $this->belongsTo('App\category');
    }
    public function imagedetailproduct(){
    //  return $this->hasMany('App\imagedetailproduct','id_product','id');
      return $this->hasMany(imagedetailproduct::class,'id_product','id');
    }
}
