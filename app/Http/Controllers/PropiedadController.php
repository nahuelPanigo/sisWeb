<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Propiedad;
use Illuminate\Http\Request;
use sisWeb\Image;
use sisWeb\Subasta;
use sisWeb\Hotsale;
use sisWeb\Semana;
use sisWeb\Fecha;
use DateTime;
use Illuminate\Database\Eloquent\Collection;

class PropiedadController extends Controller
{
    
public function search(Request $request){
     if($request->datefilter == NULL){  
        return back()->withErrors(['para realizar la busqueda debe ingresar un rango de fechas']);
    }
        if($request->locate!= NULL){
            $propiedades=Propiedad::locate($request->get('locate'))->where('deleted','=',false)->get();
        }else{
            $propiedades=Propiedad::where('deleted','=',false)->get();
        }
        $fechas = explode("-", $request->datefilter);
        $fechaInicial = DateTime::createFromFormat('d/m/Y ',$fechas[0]); 
        $fechaFinal = DateTime::createFromFormat(' d/m/Y',$fechas[1]);
        while(($fechaInicial->format('l'))!= 'Monday'){
            $fechaInicial->modify('+1 day');
        }
        $coleccion = new Collection;
        $hotsales = new collection;
        $propiedadesConFechas = new Collection;
        $subastas = new Collection; 
        $now=new DateTime();
        $now=$now->format('Y-m-d');
        $semanasHot = Semana::whereDate('date','>=',$now)->with('hotsale')->get();
        foreach ($semanasHot as $semana){
                foreach ($propiedades as $propiedad) {
                       if(($propiedad->id == $semana->propiedad_id)and($semana->hotsale != NULL)){
                        $hotsales->push($semana->hotsale);
                       }
                }   
         }
        while($fechaInicial <= $fechaFinal){
            $coleccion->push($fechaInicial->format('Y-m-d'));
            $fechaInicial->modify('+7 day');
        }
        foreach ($propiedades as $propiedad) {
           $Fechas = new Collection;
           $semanas=Semana::where('propiedad_id','=',$propiedad->id)->whereDate('date','>=',$coleccion->first())->whereDate('date','<=',($fechaFinal->format('Y-m-d')))->with('reserva')->with('subasta')->get();
            foreach($semanas as $semana){
                if((!($semana->estoyEnElRango($coleccion,$semana)))or($semana->reserva==NULL)){
                    $f=DateTime::createFromFormat('Y-m-d',$semana->date);
                    $f=$f->format('m/d/Y');
                    $Fechas->push($f);
				if(($semana->estoyEnElRango($coleccion,$semana))and($semana->subasta!=NULL)){
					$subastas->push($semana->subasta);
				}
            }
            $fecha= new Fecha;
            $fecha->propiedad=$propiedad;
            $fecha->fechas=$Fechas;
            $propiedadesConFechas->push($fecha);
        }
        
    return view('busqueda')->with('propiedades',$propiedadesConFechas)->with('subastas',$subastas)->with('hotsales',$hotsales);
  }
}

   public function busqueda(Request $request){

    $propiedades = Propiedad::where('locate','like',"%$request->locate%")->get();
    return view('listarPropiedades')->with('propiedades',$propiedades);
   } 

   public function adminSearch(Request $request){
	 $propiedades = Propiedad::where('locate','like',"%$request->locate%")->get();
    return view('adminlistarPropiedades')->with('propiedades',$propiedades);  
   }

    public function index()
    {
		$propiedades = Propiedad::where('deleted','=',false)->get();
        return view('listarPropiedades')->with('propiedades',$propiedades);
    }
    
    public function indexAdmin()
    {
        $propiedades = Propiedad::where('deleted','=',false)->get();
        return view('adminListarPropiedades')->with('propiedades',$propiedades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('registrarUnaPropiedad');
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
            'description'=>'required',
            'name'=>'required|unique:propiedades',
            'locate'=>'required',
            'archiveName'=>'|image|required',
        ]);
        if($validatedData>0){
			$image= new Image; 
			$image->archiveName= $request ->file('archiveName')->store('public');   
			$propiedad =new Propiedad;
			$propiedad->name =$request->Input('name');
			$propiedad->description= $request->Input('description');
			$propiedad->locate = $request->Input('locate'); 
            $propiedad->deleted=false;
			$propiedad->save(); 
			$propiedad = Propiedad::where('name','=',$propiedad->name)->first();
			$image->propiedad_id = $propiedad->id;
			$image->save();   
			$collection = $propiedad->images()->getEager();
			$collection->add($image);
        return redirect('/propiedades/listar')->with('propiedades',Propiedad::all())->with('message', 'se ha creado la propiedad con exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
	{
    }

    public function edit($id)
    {   
        $propiedad= new Propiedad;
        $propiedad = Propiedad::where('id','=',$id)->first();
        return view('ModificarPropiedad')->with('propiedad',$propiedad);
     }
    public function update(Request $request, $id)
    {  
        $validatedData= $request -> validate([
            'description'=>'required|max:150',
            'name'=>'required|min:2|max:20',
            'locate'=>'required|min:5',
        ]);
        if($validatedData>0){ 
			$propiedad = Propiedad::where('id','=',$id)->first();
			if($propiedad->name != $request->name){
				$validarName = $request -> validate([ 'name' => 'unique:propiedades']);
				if($validarName){
				}
			}
			$propiedad->name =$request->Input('name');
			$propiedad->description= $request->Input('description');
			$propiedad->locate = $request->Input('locate'); 
			$propiedad->save(); 
			return view('adminlistarPropiedades')->with('propiedades',Propiedad::all())->with('message', 'los cambios fueron guardados con exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $propiedad=new Propiedad;
        $propiedad->eliminar($id);
        return redirect('/propiedades/listar')->with('message', 'la propiedad ha sido eliminada exitosamente');
    }

    public function deleteAll($id)
    {
        $propiedad=new Propiedad;
        $propiedad->eliminarConSemanas($id);
        return redirect('/propiedades/listar')->with('message', 'la propiedad ha sido eliminada junto con las subastas, hotsales y reservas posteriores a la fecha de hoy');
    }

    public function destroy(propiedad $propiedad)
    {
        //
    }
	
}
