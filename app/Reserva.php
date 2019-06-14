<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable=['user_id','semana_id'];

     public function user()
    {
    	return $this->belongsTo('app\User');
    }

     public function semana()
     {
     	return $this->hasOne('app\Semana');
     }
}
