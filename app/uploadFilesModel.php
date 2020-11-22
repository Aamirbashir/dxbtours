<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class uploadFilesModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'upload_file';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }
}
