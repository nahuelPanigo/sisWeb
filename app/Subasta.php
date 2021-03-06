<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use sisWeb\Propiedad;
use sisWeb\Semana;
use sisWeb\Subasta;
use DateTime;

class Subasta extends Model
{
    protected $talbe='subastas';

    protected $fillable=['semana_id','minPrice','finalPrice','user_idWinner','finish'];

     public function user()
    {
    	return $this->belongsTo('sisWeb\User','user_idWinner');
    } 

      public function pujas()
    {
    	return $this->hasMany('sisWeb\Puja');
    }
     public function semana()
     {
     	return $this->belongsTo('sisWeb\Semana','semana_id');
     }

    public function name(Subasta $subasta){
        $semana = new Semana;
        $semana = Semana::where('id','=',$subasta->semana_id)->first();
        $propiedad = new Propiedad;
        $propiedad = Propiedad:: where ('id', '=', $semana->propiedad_id)->first();
        return($propiedad);
     }
 public function date(Subasta $subasta){
        $semana = new Semana;
        $semana = Semana::where('id','=',$subasta->semana_id)->first();
        return($semana->date);
     }

    public function hayUnaSubasta(DateTime $date,$propiedad_id){
        $semana=Semana::whereDate('date','=',$date)->where('propiedad_id','=',$propiedad_id)->first();
        if($semana!=null){
              $semana->delete();
              return 1;
        }
        return 0;
    }
	public function estaActiva(Subasta $subasta){
		$semana = Semana::find($subasta->semana_id);
		$now = new DateTime();
		$date= DateTime::createFromFormat('Y-m-d',$semana->date);
		$date->modify('-6 month');
		if($now>=$date){
			$date->modify('+72 hours');
			return ($now<=$date);
		}
    return false;
}

	public function puedeFinalizar2(Subasta $subasta){
		$now = new DateTime();
		$date= DateTime::createFromFormat('Y-m-d',$subasta->date($subasta));
    $dateStart=$date->modify('-6 month');
    $new_time =$dateStart->modify('+72 hours');
		return($now>$new_time);
	}	
	
    public function esDeSubasta ($date ,$propiedad_id){
        $semana=new Semana;
        $semana= Semana::whereDate('date','=', $date)->where('propiedad_id','=', $propiedad_id)->first();
        $subasta=new Subasta;
        $subasta=Subasta::whereDate('semana_id','=', $semana->id)->first();
        if($subasta == null){
            return false;
        }
        else{
            $semana->delete();
            return true;
        }
     }
  public function devolverSemana($id){
            $semana=new Semana;
            $semana= Semana::find($id);
            return $semana;
  }


  public function eliminar($id)
    {
        $now = new DateTime();
        $subasta= Subasta::find($id);
		$semana= Semana::find($subasta->semana_id);
        $date= DateTime::createFromFormat('Y-m-d',$semana->date);
		$user =new User;
        if($subasta->user_idWinner != NULL){
            $user=User::find($subasta->user_idWinner);
            if(($date->format('Y'))==($now->format('Y'))){
              $user->creditsThisYear=$user->creditsThisYear+1;
            }else{
              $user->creditsNextYear=$user->creditsNextYear+1;
            }
         $user->save();   
        }
        $semana->delete();
    }
}
