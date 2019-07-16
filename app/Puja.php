<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
    protected $table = 'pujas';

    protected $fillable = ['user_id','subasta_id','monto'];
    
     public function user()
    {
    	return $this->belongsTo('sisWeb\User');
    }

     public function subasta()
    {
    	return $this->belongsTo('sisWeb\Subasta');
    }

    public function crearPuja(Subasta $subasta)
    {

        $puja= new Puja;
        

    } 

}
