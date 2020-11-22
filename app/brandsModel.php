<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class brandsModel extends Model
{
    use SoftDeletes,Userstamps;

    protected $table = 'brands_list';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }

    public function logoFile(){
        return $this->hasOne(uploadFilesModel::class,'id','logo')->latest();
    }
}
