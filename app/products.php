<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class products extends Model
{
    //
    use SoftDeletes,Userstamps;
       protected $table = 'services_products';

         public function logoFile(){
        return $this->hasOne(uploadFilesModel::class,'id','product_image')->latest();
    }

    

         public function gallery(){
        return $this->hasMany(gallery::class,'product_id','id')->where(['type'=>'product'])->get();
    }
}
