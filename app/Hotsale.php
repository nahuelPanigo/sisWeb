<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class Hotsale extends Model
{
    protected $table ='hotsales';

    protected $fillable = ['price','user_id','semana_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }


     public function semana()
     {
     	return $this->hasOne('app\Semana');
     }

}
