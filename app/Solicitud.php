<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
     protected $table ='solicitudes';

    protected $fillable =['user_id','view'];

     public function user()
    {
    	return $this->belongsTo('app\User');
    }
}
