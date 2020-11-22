<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class pageAboutUsModel extends Model
{
    use Userstamps,SoftDeletes;
    protected $table = 'page_about_us';


    public function logoFile(){
        return $this->hasOne(uploadFilesModel::class,'id','logo_link')->latest();
    }
}
