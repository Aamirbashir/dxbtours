<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class socialLinksModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'social_links';

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'Active');
    }
}
