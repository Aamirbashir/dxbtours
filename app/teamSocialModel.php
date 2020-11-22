<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class teamSocialModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'teamSocial';
}
