<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class propiedad extends Model
{
    protected $table ='propiedades';

    protected fillable =['name','description','locate'];


    public function semanas()
    {
    	return $this->hasMany('app\Semana');
    }

     public function images()
    {
    	return $this->hasMany('app\Image');
    }
}
