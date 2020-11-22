<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class ourTeamModel extends Model
{
    use SoftDeletes,Userstamps;
    protected $table = 'our_team';

    public function socials(){
        return $this->hasMany(teamSocialModel::class,'team_id','id');
    }
    public function dp(){
        return $this->hasOne(uploadFilesModel::class,'id','display_image')->latest();
    }
}
