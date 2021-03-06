<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Hotsale extends Model
{
    protected $table ='hotsales';

    protected $fillable = ['price','user_id','semana_id'];

    public function user()
    {
    	return $this->belongsTo('sisWeb\User');
    }
    public function semana()
     {
     	return $this->belongsTo('sisweb\Semana','semana_id');
     }
     
	public function name(Hotsale $hotsale){
        $semana = new Semana;
        $semana = Semana::where('id','=',$hotsale->semana_id)->first();
        $propiedad = new Propiedad;
        $propiedad = Propiedad:: where ('id', '=', $semana->propiedad_id)->first();
        return($propiedad);
     } 

    public function devolverSemana($id){
            $semana=new Semana;
            $semana= Semana::find($id);
            return $semana;

        }
    
}
