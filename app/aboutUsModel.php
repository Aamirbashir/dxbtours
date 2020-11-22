<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class aboutUsModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'about_us';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }
}
