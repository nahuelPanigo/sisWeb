<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Hotsale;
use Illuminate\Http\Request;
use sisWeb\Semana;
use sisWeb\User;
use sisWeb\Puja;
use DateTime;

class HotsaleController extends Controller
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
	
	public function indexAdmin(){
		$hotsales = Hotsale::all();
		return view('adminHotsale')->with('hotsales',$hotsales);
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create($id)
    {
        return view('registrarHotsale')->with('id',$id);
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
			'precio' =>'required']);
		$now = new DateTime();
        $newformat=DateTime::createFromFormat('m/d/Y',$request->date); 
        $interval = date_diff($now, $newformat);
		if($interval->days < 180){
			$newDate = date("Y/m/d", strtotime($request->date));
			$buscarSemana=Semana::where ('date','=',$newDate)->where('propiedad_id','=',$request->propiedad_id)->first();
			if(is_null($buscarSemana)){
				$semana= new Semana;
				$semana->date = $newDate;
				$semana->propiedad_id=$request->propiedad_id; 
				$semana->save();
				$semana=Semana::where('date','=',$newDate)->where('propiedad_id','=',$request->propiedad_id)->first();
				$hotsale = new Hotsale;
				$hotsale ->price =$request->Input('precio');
				$hotsale->semana_id =$semana->id;
				$hotsale-> user_id = null;
				$hotsale->save();
				return view('adminHotsale')->with('hotsales',Hotsale::all());
			}else{
			  return back()->with('id',$request->propiedad_id)->withErrors(['La semana se encuentra ocupada']);	
			}				
		}else{
			return back()->with('id',$request->propiedad_id)->withErrors(['la semana debe iniciar dentro de menos de 6 meses']);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\Hotsale  $hotsale
     * @return \Illuminate\Http\Response
     */
    public function show(Hotsale $hotsale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\Hotsale  $hotsale
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotsale $hotsale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\Hotsale  $hotsale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotsale $hotsale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\Hotsale  $hotsale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotsale $hotsale)
    {
    }
	public function delete($id){
		$hotsale= Hotsale::find($id);
        $hotsale->delete();
        return back()->with('hotsales',Hotsale::all());
	}
}
