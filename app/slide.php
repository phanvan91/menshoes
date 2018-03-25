<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    protected $table = 'slides';
    protected $fillable = ['title','des','link','image'];
}
