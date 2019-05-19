<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable=['userVip_id','semana_id'];

     public function userVip()
    {
    	return $this->belongsTo('App\UserVip');
    }

     public function semana()
     {
     	return $this->hasOne('app\Semana');
     }
}
