<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class UserVip extends Model
{
    //


    public function reservas()
    {
    	return $this->hasMany('app\Reserva');
    }
}
