<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
    protected $table = 'pujas';

    protected $fillable = ['user_id','subasta_id'];
    
     public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function subasta()
    {
    	return $this->belongsTo('App\Subasta');
    }

    public function crearPuja(Subasta $subasta)
    {

        $puja= new Puja;
        

    } 

}
