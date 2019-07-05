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
     public function hacerSemana( $date,$propiedad_id){
            $semanaNueva = new Semana; 
            $semanaNueva->date = $date;
            $semanaNueva->propiedad_id = $propiedad_id;
            $semanaNueva->save();
            $semanaNueva=Semana::whereDate('date','=', $date)->where('propiedad_id','=', $semanaNueva->propiedad_id)->first();
            return $semanaNueva;
     }
    public function devolverDatosPropiedad($id){
        $propiedad=new Propiedad;
        $propiedad= Propiedad::find($id);
        return $propiedad;
    }
public function eliminarSemanaDeUnaPropiedad($propiedad_id){
    $now= new DateTime();
    $semanas=Semana::where('propiedad_id','='$propiedad_id)->get();
    foreach ($semanas as $semana ) {
      if($semana->date>$now){
        $semana->delete();
      }
    }
  }
}
