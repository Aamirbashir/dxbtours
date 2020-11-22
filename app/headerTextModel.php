<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class headerTextModel extends Model
{
    use Userstamps,SoftDeletes;
    protected $table = 'header_text';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }
}
