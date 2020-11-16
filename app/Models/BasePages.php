<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;


class BasePages extends Base {

   use SoftDeletes;

   protected $table = 'basepages';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];


}
