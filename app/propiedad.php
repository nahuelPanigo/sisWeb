<?php

namespace sisWeb;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table ='propiedades';

    protected $fillable =['name','description','locate'];


    public function semanas()
    {
    	return $this->hasMany('app\Semana');
    }

     public function images()
    {
    	return $this->hasMany('sisWeb\Image');
    }
    
}
