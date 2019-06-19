<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use sisWeb\Reserva;
use sisWeb\Semana;
class User extends Model
{
    protected $table ='users';

    protected $fillable=['name','secondName','userName','creditCardNumber','creditCardCode','creditCardDate','mail','userType','creditCard','password','birthDay','dni'];

    public function subastas()
    {
    	return $this->hasMany('app\Subasta');
    }

    public function hotsales()
    {
    	return $this->hasMany('app\Hotsale');
    }

    public function reservas()
    {
        return $this->hasMany('sisWeb\Reserva');
    }


      public function pujas()
    {
        return $this->hasMany('app\Puja');
    }

    public function cantReservas($id,$anio){
    $user=User::find($id);
    $cant=0;
    $reservas=Reserva::where('user_id','=',$id)->get();
    foreach ($reservas as $reserva => $value) {
         $semana=Semana::where('semana_id','=',$reserva->semana_id);
         if(($semana_date->format('%Y'))==$anio){
            $cant=$cant+1;
          }
    }
     $subastas=Subasta::where('user_idWinner','=',$id)->get();
     foreach ($subastas as $subasta => $value) {
         $semana=Semana::where('semana_id','=',$subasta->semana_id);
         if(($semana_date->format('%Y'))==$anio){
            $cant=$cant+1;
          }
    }
    return $cant;
    }

    public function verificarSemana($id,$date){
    $cant=0;
    $reservas=Reserva::where('user_id','=',$id)->get();
    foreach ($reservas as $reserva => $value) {
         $semana=Semana::where('semana_id','=',$reserva->semana_id);
         if($semana_date==$date){
            $cant=$cant+1;
          }
    }
     $subastas=Subasta::where('user_idWinner','=',$id)->get();
     foreach ($subastas as $subasta => $value) {
         $semana=Semana::where('semana_id','=',$subasta->semana_id);
         if($semana_date==$date){
            $cant=$cant+1;
          }
    }
        return ($cant== 0);
    }

}



