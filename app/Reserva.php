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
    	return $this->belongsTo('app\User');
    }

     public function semana()
     {
     	return $this->hasOne('app\Semana');
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
            $semana=Semana::find($reserva->semana_id);
            $semana->delete();
            $reserva->delete();
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

