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
		$validatedData = $request -> validate([
            'date'=>'required',
			'minPrice' =>'required']);
        $now = new DateTime();
        $newformat=DateTime::createFromFormat('m/d/Y',$request->date); 
        $interval = date_diff($now, $newformat);
        if($interval->days>180){
			$newDate = date("Y/m/d", strtotime($request->date));
			$buscarSemana=Semana::where ('date','=',$newDate)->where('propiedad_id','=',$request->propiedad_id)->first();
			if(is_null($buscarSemana)){
				$semana= new Semana;
				$semana->date = $newDate;
				$semana->propiedad_id=$request->propiedad_id; 
				$semana->save();
				$semana=Semana::where('date','=',$newDate)->where('propiedad_id','=',$request->propiedad_id)->first();
				$subasta =new Subasta;
				$subasta->semana_id =$semana->id;
				$subasta->minPrice=$request->Input('minPrice');
				$subasta->finish=0;
				$subasta->finalPrice=$subasta->minPrice;
				$subasta->save();
				return view('adminSubastas')->with('subastas',Subasta::all());
			}else{
				return back()->with('id',$request->propiedad_id)->withErrors(['ya existe una subasta/reserva para esta semana']);
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
		$subasta=Subasta::find($request->subasta_id);
		$semana=Semana::find($subasta->semana_id);
		$pujas = Puja::where('subasta_id','=',$subasta->id)->get();
		$ok=0;
		$user=new User;
		$mensaje= "";
		foreach ($pujas as $puja) {
			if(!$ok){
				if($subasta->minPrice <= $puja->monto ){
					if($user->puedeGanar($puja->user_id,$semana->date)){
						$ok=1;
						$usser->id = $puja->user_id;
						$mensaje ="se registro ganador con exito";
					}
				}
			}
		}
		if($ok){
			$subasta->user_idWinner = $user->id;
		}else{
			$mensaje = "no se pudo registrar ganador";
		}
		$subasta->finish = 1;	
		$subasta->save();
		return redirect('/subastas/listar')->withErrors ([$mensaje]);
	}
}
