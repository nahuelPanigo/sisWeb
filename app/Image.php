<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
	protected $table ='images';

    protected $fillable=['archiveName','propiedad_id'];


    public function propiedad()
     {
     	return $this->hasOne('app\Propiedad');
     }
}
