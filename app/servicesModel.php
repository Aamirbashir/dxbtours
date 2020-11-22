<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Wildside\Userstamps\Userstamps;
use Image;

class servicesModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'services_list';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }

    public function logoFile(){
        return $this->hasOne(uploadFilesModel::class,'id','logo')->latest();
    }

    public function fileLink(){

//        $image = Image::make(Storage::url('app/'.$this->logoFile->url));
//        return $image->response();
//        return Storage::url('app/'.$this->logoFile->url);
    }
}
