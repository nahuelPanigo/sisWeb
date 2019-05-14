<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
    protected $talbe='subastas';

    protected $fillable=['user_id','semana_id','minPrice','finalPrice','user_idWinner'];

     public function user()
    {
    	return $this->belongsTo('App\User');
    }

      public function pujas()
    {
    	return $this->hasMany('app\Puja');
    }


     public function semana()
     {
     	return $this->hasOne('app\Semana');
     }
}
