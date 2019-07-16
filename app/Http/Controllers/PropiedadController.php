<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Propiedad;
use Illuminate\Http\Request;
use sisWeb\Image;
use sisWeb\Subasta;
use sisweb\Hotsale;

class PropiedadController extends Controller
{
    
    public function search(Request $request){
     if($request->datefilter == NULL){  
        return back()->withErrors(['para realizar la busqueda debe ingresar un rango de fechas']);
    }else{
        if($request->locate!= NULL){
        $propiedades=Propiedad::locate($request->get('locate'))->where('deleted','=',false)->get();
    }else{
        $propiedades=Propiedad::where('deleted','=',false)->get()''
    }
        $todasSem=new collection;
        foreach ($propiedades as $propiedad) {
            $semanas=Semanas::where('id_propiedad','=',$propiedad->id)->get();
            foreach($semanas as $semana){
                $todasSem->push($semana);
            }
        }
        $semanas=Semanas::where('id_propiedad','=','');
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
