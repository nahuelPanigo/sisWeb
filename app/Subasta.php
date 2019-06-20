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

    protected $fillable=['semana_id','minPrice','finalPrice','user_idWinner'];

     public function user()
    {
    	return $this->belongsTo('App\User');
    } 

      public function pujas()
    {
    	return $this->hasMany('app\Puja');
    }
     public function semana()
     {
     	return $this->hasOne('sisWeb\Semana');
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
		$interval = date_diff($now, $date);
		return (($interval->format('%m')<6) and (($interval->format('%m')>=5)and($interval->format('%d')>24)));
	}

}
