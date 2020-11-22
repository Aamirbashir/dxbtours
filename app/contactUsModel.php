<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contactUsModel extends Model
{
    use SoftDeletes;
    protected $table = 'contact_queries';
    
}
