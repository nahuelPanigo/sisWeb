<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;
use sisWeb\Semana;
use DateTime;
class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable=['user_id','semana_id'];

     public function user()
    {
    	return $this->belongsTo('sisWeb\User','user_id');
    }

     public function semana()
     {
     	return $this->hasOne('sisWeb\Semana','semana_id');
     }


     public function hacerReserva($semana_id,$id){
        $reserva= new Reserva;
        $reserva->user_id =$id;
        $reserva->semana_id = $semana_id;
        $reserva->save();
     }

     public function eliminarReserva($id){

        $reserva= Reserva::find($id);
        $semana=Semana::find($reserva->semana_id);
        $date=DateTime::createFromFormat('Y-m-d',$semana->date);
        $now = new DateTime();
        $interval = date_diff($now,$date);
        
        if(($interval->format('%m'))>2){
            $anio=($date->format('%Y'));
            $anioNow=($now->format('%Y'));
            $user=User::find($reserva->user_id);
            if($anio==$anioNow){
                $user->creditsThisYear=$user->creditsThisYear+1;
            }else{
                 $user->creditsNextYear=$user->creditsNextYear+1;
            }
            $semana->delete();
            $user->save();
            return 1;
		}
		return 0;
		}

        public function devolverSemana($id){
            $semana=new Semana;
            $semana= Semana::find($id);
            return $semana;
        }

}

