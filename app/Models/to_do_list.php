<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class to_do_list extends Model
{
    use HasFactory;

    public function user(){
        
        return $this->hasOne('App\Models\user','id','emp_id');
    }
}
