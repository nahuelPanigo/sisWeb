<?php

namespace sisWeb;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class Fecha extends Model
{
	protected $table ='fechas';

    protected $fillable =['fechas','propiedad'];
}