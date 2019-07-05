<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use sisWeb\Reserva;
use sisWeb\Semana;
use sisWeb\Hotsale;
use DateTime;
class User extends Model
{
    protected $table ='users';

    protected $fillable=['name','secondName','userName','creditCardNumber','creditCardCode','creditCardDate','mail','userType','creditCard','password','birthDay','dni','deleted'];

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
         $date= DateTime::createFromFormat('Y-m-d',$semana->date); 
         if(($date->format('Y'))==$anio){
            $cant=$cant+1;
          }
    }
    return $cant;
    }
    
    public function eliminar($id){
        $user=User::find($id);
        $user->deleted=true;
        $user->eliminarMisSubastas($id);
        $user->eliminarMisReservas($id);
        $user->eliminarMisHotsales($id);
        $user->save();
    }


public function eliminarMisSubastas($id){
    $subastas=Subasta::where('user_idWinner','=',$id)->get();
    $now = new DateTime();
    foreach ($subastas as $subasta){
        $semana=Semana::find($subasta->semana_id);
        if($semana->date()>$now){
            $subasta->delete();
        }
    }
}

public function eliminarMisReservas($id){
    $reservas=Reserva::where('user_id','=',$id)->get();
    $now = new DateTime();
    foreach ($reservas as $reserva){
        $semana=Semana::find($reserva->semana_id);
        if($semana->date>$now){
            $reserva->delete();
        }
    }
}

public function eliminarMisHotsales($id){
    $hotsales=Hotsale::where('user_id','=',$id)->get();
    $now = new DateTime();
    foreach ($hotsales as $hotsale){
        $semana=Semana::find($hotsale->semana_id);
        if($semana->date>$now){
            $hotsale->delete();
        }
    }
}
/*se fija que el usuario tenga la semana $date libre */
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
    $hotsales=Hotsale::where('user_id','=',$id)->get();
    foreach ($hotsales as $hotsale) {
         $semana=Semana::find($hotsale->semana_id);
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
		return(($user->verificarSemana($id,$dateFormat)) and ($user->cantReservas($id,$dateFormat->format('%Y')))and($user->deleted==false));
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
