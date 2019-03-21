<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $table='good';

    protected $primaryKey='goods_id'; 
    
    public $timestamps=false;
}
