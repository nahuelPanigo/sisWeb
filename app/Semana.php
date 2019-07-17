<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class Semana extends Model
{
    protected $table='semanas';

    protected $fillable=['date','propiedad_id'];

    public function propiedad()
    {
    	return $this->belongsTo('sisWeb\Propiedad','propiedad_id');
    }

     public function hotsale()
     {
     	return $this->hasOne('sisWeb\Hotsale');
     }
     public function subasta()
     {
     	return $this->hasOne('sisWeb\Subasta');
     }
     public function reserva()
     {
     	return $this->hasOne('sisWeb\Reserva');
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
public function eliminarSemanasDeUnaPropiedad($propiedad_id){
    $now = new DateTime();
    $semanas=Semana::where('propiedad_id','=',$propiedad_id)->get();
    foreach ($semanas as $semana ) {
        $date= DateTime::createFromFormat('Y-m-d',$semana->date);
      if($date>$now){
        $semana->delete();
      }
    }
  }

 public function estoyEnElRango(Collection $col,Semana $semana){
    foreach ($col as $date) {
        if($date == $semana->date){
            return true;
        }    
    }
    return false;
 }

}
