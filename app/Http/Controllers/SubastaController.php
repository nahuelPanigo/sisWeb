<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Subasta;
use Illuminate\Http\Request;
use sisWeb\Propiedad;
use sisWeb\Semana;
use DateTime;

class SubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subastas= Subasta::all();

        return view('subastas')->with('subastas',$subastas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function crear($id)
    {
        return view('crearSubasta')->with($id);
    }

    public function create()
    {
        return view('crearSubasta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new DateTime();
        $newformat= DateTime::createFromFormat('Y-m-d',$request->date); 
        $interval = date_diff($now, $newformat)->days;
        if(($interval>180)&&($interval<360)){  
        $semana= new Semana;
        $semana->date=$request->Input('date');    
        $semana->propiedad_id=$request->Input('propiedad_id');  
        $semana->save();
        $semana=Semana::where('date','=',$request->date)->where('propiedad_id','=',$request->propiedad_id)->first();
        $subasta =new Subasta;
        $subasta->semana_id =$semana->id;
        $subasta->minPrice=$request->Input('minPrice');
        $subasta->user_idWinner="";
        $subasta->finish=0;
        $subasta->finalPrice=0;
        return view('Subastas')->with('subastas',Subasta::all());
        }
        if($interval>360){
        return back()->withErrors (['el plazo de tiempo maximo para subastar es a lo sumo 1 año anterior de la semana']);
        }
        return back()->withErrors(['el plazo de tiempo minimo para subastar es de al menos 6 meses antes de la semana']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function show(Subasta $subasta)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function edit(Subasta $subasta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subasta $subasta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subasta $subasta)
    {
        //
    }
}
