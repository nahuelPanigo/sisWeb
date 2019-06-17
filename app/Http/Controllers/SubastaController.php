<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Subasta;
use Illuminate\Http\Request;
use sisWeb\Propiedad;
use sisWeb\Semana;
use sisWeb\User;
use sisWeb\Puja;
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
        $subastas= Subasta::where("finish", "=" , 0)->get();
        return view('subastas')->with('subastas',$subastas);
    }
	public function indexAdmin(){
		$subastas = Subasta::all();
		return view('adminSubastas')->with('subastas',$subastas);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        return view('crearSubasta')->with('id',$id);
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
        $interval = date_diff($now, $newformat);
        if($interval->days>180){
			$buscarSemana=Semana::where ('date','=',$request->date)->where('propiedad_id','=',$request->propiedad_id)->first();
			if(is_null($buscarSemana)){
				$semana= new Semana;
				$semana->date=$request->Input('date');    
				$semana->propiedad_id=$request->propiedad_id; 
				$semana->save();
				$semana=Semana::where('date','=',$request->date)->where('propiedad_id','=',$request->propiedad_id)->first();
				$subasta =new Subasta;
				$subasta->semana_id =$semana->id;
				$subasta->minPrice=$request->Input('minPrice');
				$subasta->finish=0;
				$subasta->finalPrice=$subasta->minPrice;
				$subasta->save();
				return view('adminSubastas')->with('subastas',Subasta::all());
			}else{
				return back()->with('id',$request->propiedad_id)->withErrors(['ya existe una subasta para esta semana']);
			}
        }else{
			return back()->with('id',$request->propiedad_id)->withErrors(['la semana debe ser dentro de 6 meses minimo']);
		}

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
        
    }
	public function finalizarSubasta(Request $request){
		$subasta= new Subasta;
		$subasta = Subasta::where('id', '=' ,$request->subasta_id)->first();
		if($subasta->finalPrice >= $subasta->minPrice ){
			$puja = new Puja;
			$puja = Puja::where('monto', '=', $subasta->finalPrice)->where('subasta_id','=',$subasta->id)->first();
			$user = new User;
			$user = User::where('id','=', $puja->user_id)->first();
			$subasta->user_idWinner = $user->id;
		}
		$subasta->finish = 1;	
	}
}
