<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    //
     protected $table = 'product_gallery';

     public function product()
     {
         return $this->belongsTo(product::class, 'id')->pluck('name')->first();

     }
}
