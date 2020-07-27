<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    //
    protected $table = 'resultdata';
    public $timestamps = false;

    function relation()
    {
        return $this->hasOne('App\User','id','user_id');

        $user = User::find(1)->relation;
    }
}
