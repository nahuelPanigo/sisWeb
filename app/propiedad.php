<?php

namespace sisWeb;
use Illuminate\Http\Request;
use sisWeb\Semana;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table ='propiedades';

    protected $fillable =['name','description','locate','deleted'];


    public function semanas()
    {
    	return $this->hasMany('app\Semana');
    }

     public function images()
    {
    	return $this->hasMany('sisWeb\Image');
    }

    public function eliminar($id)
    {
        $propiedad= Propiedad::find($id);
        $propiedad->deleted=true;
        $propiedad->save();
    }
 public function eliminarConSemanas($id)
    {
        $propiedad= Propiedad::find($id);
        $semana= new Semana;
        $semana->eliminarSemanasDeUnaPropiedad($id);
        $propiedad->deleted=true;
        $propiedad->save();
}
    public function scopeLocate($query, $locate){

        $query->where('locate',$locate);

    }
}
