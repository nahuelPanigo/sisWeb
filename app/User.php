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
        public function solicitudes()
    {
        return $this->hasOne('app\Solicitud');
    }

    public function cantReservas($id){
    $user=User::find($id);
    $cant=0;
    $reservas=Reserva::where('user_id','=',$id)->get();
    foreach ($reservas as $reserva => $value) {
         $semana=Semana::where('semana_id','=',);
         $cant=$cant+1;
    }
    return $cant;
    }

}

