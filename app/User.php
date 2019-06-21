<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use sisWeb\Reserva;
use sisWeb\Semana;
use DateTime;
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
        public function solicitudes()
    {
        return $this->hasOne('app\Solicitud');
    }

    public function puedoEliminarme($id){
        $hotsales=Hotsale::where('user_id','=',$id);
        $user=new User;
        return (($hotsale->isEmpty())and($user->cantReservas=0));
    }


    public function cantReservas($id,$anio){
    $user=User::find($id);
    $cant=0;
    $reservas=Reserva::where('user_id','=',$id)->get();
    foreach ($reservas as $reserva) {
         $semana=Semana::find($reserva->semana_id);
         $date= DateTime::createFromFormat('Y-m-d',$semana->date);
         if(($date->format('Y'))==$anio){
            $cant=$cant+1;
          }
    }
     $subastas=Subasta::where('user_idWinner','=',$id)->get();
     foreach ($subastas as $subasta ) {
         $semana=Semana::find($subasta->semana_id);
         if(($semana->date->format('%Y'))==$anio){
            $cant=$cant+1;
          }
    }
    return $cant;
    }

    public function verificarSemana($id,$date){
    $cant=0;
    $reservas=Reserva::where('user_id','=',$id)->get();
	$date = $date->format('Y-m-d');
    foreach ($reservas as $reserva) {
         $semana=Semana::find($reserva->semana_id);
         if($semana->date==$date){
            $cant=$cant+1;
          }
    }
     $subastas=Subasta::where('user_idWinner','=',$id)->get();
     foreach ($subastas as $subasta) {
         $semana=Semana::find($subasta->semana_id);
         if($semana->date==$date){
            $cant=$cant+1;
          }
    }
        return ($cant== 0);
    }

	public function puedeGanar($id,$date){
		$user=User::find($id);
		$dateFormat = DateTime::createFromFormat('Y-m-d',$date);
		return(($user->verificarSemana($id,$dateFormat)) and ($user->cantReservas($id,$dateFormat->format('%Y'))));
	}	
    public function misReservas($id){
      $reservas=Reserva::where('user_id','=',$id)->get();
      return $reservas;
      }
   public function misSubastas($id){
      $subastas=Subasta::where('user_idWinner','=',$id)->get();
      return $subastas;
      }
     
}
