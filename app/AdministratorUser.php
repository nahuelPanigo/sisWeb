<?php

namespace sisWeb;

use Illuminate\Database\Eloquent\Model;

class AdministratorUser extends Model
{
   protected $table = 'administratorsUser';

protected $filable =['userName','password','mail'];
}
