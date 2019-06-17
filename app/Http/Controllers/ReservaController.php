<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Reserva;
use Illuminate\Http\Request;
use sisWeb\User;
use sisWeb\Semana;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('indexIngenieria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 $validatedData = $request -> validate([
            'date'=>'required',]);
		$id = session('id');
		if($validatedData){
			$user= new User;
			$user = User::where('id','=',$id)->first();
			foreach ($user->subastas as $subasta) {
				
			}
			foreach ($user->reservas as $reservas) {
				
			}
			if( 3 < 2){
				$semana = new Semana;
				$semana = Semana::where('date','='. $request->date)->where('propiedad_id','=', $request-> propiedad_id);
				if($semana==null){
					$now = new DateTime();
					$newformat= DateTime::createFromFormat('Y-m-d',$request->date); 
					$interval = date_diff($now, $newformat);
					if(($interval >160 ) and ($interval < 360)){
						$semanaNueva = new Semana; 
						$semanaNueva->date = $request -> date;
						$semanaNueva->propiedad_id = $request-> propiedad_id;
						$semanaNueva-> save();
						$semanaNueva = Semana::where('date','='. $request->date)->where('propiedad_id','=', $request-> propiedad_id);
						$reserva = new Reserva;
						$reserva-> userVip_id = $id;
						$reserva-> semana_id = $semanaNueva -> id;
						$reserva->save();
						return back();
					}else{
						return back()->withErrors(['La fecha ingresada es invalida']);
					}
				}else{
				   return back()->withErrors(['La propiedad se encuentra ocupada en esa semana']);
				}
			}else{
				return back()->withErrors(['El usuario no posee creditos']);
			}
		}
	}
    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(reserva $reserva)
    {
        //
    }
}
