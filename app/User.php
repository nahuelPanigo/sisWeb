<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table ='users';

    protected $fillable=['name','secondName','userName','creditCardNumber','creditCardCode','creditCardDate','mail','userType','creditCard','password','birthDay'];

    public function subastas()
    {
    	return $this->hasMany('app\Subasta');
    }

    public function hotsales()
    {
    	return $this->hasMany('app\Hotsale');
    }

      public function pujas()
    {
        return $this->hasMany('app\Puja');
    }
}