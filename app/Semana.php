<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table='semanas';

    protected $fillable=['date','propiedad_id'];

    public function propiedad()
    {
    	return $this->belongsTo('app\Propiedad');
    }

     public function hotsale()
     {
     	return $this->belongsTo('app\Hotsale');
     }
     public function subasta()
     {
     	return $this->belongsTo('app\Subasta');
     }
     public function reserva()
     {
     	return $this->belongsTo('app\Reserva');
     }
}
