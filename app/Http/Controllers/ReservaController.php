<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Reserva;
use Illuminate\Http\Request;
use sisWeb\User;
use sisWeb\Semana;
use sisWeb\Subasta;
use DateTime;

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
            $user=User::find($id);
            if($user->userType=='vip'){
                $date= DateTime::createFromFormat('m/d/Y',$request->date); 
                $anio=($date->format('Y'));
                $cant=$user->cantCreditos($id,$anio);
                if(!($user->verificarSemana($id,$date))){
                    return back()->withErrors(['ya posee una reserva para esa fecha']);
                }else{
			    if($cant > 0 ){
                    $now = new DateTime(); 
                    $interval = date_diff($now, $date);
                    if(($interval->days > 180 ) and ($interval->days < 365)){
				        $semana = Semana::whereDate('date','=', $date)->where('propiedad_id','=', $request->propiedad_id)->first();
                        $subasta=new Subasta;
				        if(($semana == null)||($subasta->esDeSubasta($date,$request->propiedad_id))){
						      $semana= new semana;
                              $semana= $semana->hacerSemana($date,$request->propiedad_id);
                              $reserva = new Reserva;
						      $reserva->hacerReserva($semana->id,$id);
                              $user->aumentarCredito($user->id,$anio);
					          return back()->with('message', 'su reserva si ha registrado con exito');
					    }else
					       return back()->withErrors(['La propiedad en esa fecha se encuentra reservada']);
				    }else
                        return back()->withErrors(['La fecha ingresada debe ser con mas de 6 meses de anticipacion y menor a 1 año']);
			     }else
				    return back()->withErrors(['El usuario no posee creditos']);
	       }
            }else
                return back()->withErrors(['debes ser vip para poder reservar']);
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
public function delete($id){
{       $reserva= new Reserva;
        if($reserva->eliminarReserva($id)){
            return redirect('/inicio')with('message','se le han devueltos los creditos');
        }else
            return redirect('/inicio')->with('message','su reserva ha sido cancelada pero no se han devuelto los creditos por falta de anticipacion');
    }
}

    public function destroy(Reserva $reserva)
    {  
    }
}