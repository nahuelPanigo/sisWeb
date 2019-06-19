<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table='semanas';

    protected $fillable=['date','propiedad_id'];

    public function propiedad()
    {
    	return $this->belongsTo('sisWeb\Propiedad');
    }

     public function hotsale()
     {
     	return $this->belongsTo('sisWeb\Hotsale');
     }
     public function subasta()
     {
     	return $this->belongsTo('sisWeb\Subasta');
     }
     public function reserva()
     {
     	return $this->belongsTo('app\Reserva');
     }
     public function hacerSemana(DateTime $date,$propiedad_id){
            $semanaNueva = new Semana; 
            $semanaNueva->date = $date;
            $semanaNueva->propiedad_id = $request->propiedad_id;
            $semanaNueva->save();
            $semanaNueva=Semana::whereDate('date','=', $date)->where('propiedad_id','=', $request->propiedad_id)->first();
            return $semana;
     }
}
