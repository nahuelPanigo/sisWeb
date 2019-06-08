<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Propiedad;
use Illuminate\Http\Request;
use sisWeb\Image;

class PropiedadController extends Controller
{
    
   public function search(Request $request){

    $propiedades = Propiedad::where('locate','like',"%$request->locate%")->get();
    return view('listarPropiedades')->with('propiedades',$propiedades);

   } 



    public function index()
    {
		$propiedades = Propiedad::all();
        return view('listarPropiedades')->with('propiedades',$propiedades);
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
            'description'=>'required|max:150',
            'name'=>'required|min:2|max:20|unique:propiedades',
            'locate'=>'required|min:5',
            'archiveName'=>'|image|required',
        ]);
        if($validatedData>0){
			$image= new Image; 
			$image->archiveName= $request ->file('archiveName')->store('public');   
			$propiedad =new Propiedad;
			$propiedad->name =$request->Input('name');
			$propiedad->description= $request->Input('description');
			$propiedad->locate = $request->Input('locate'); 
			$propiedad->save(); 
			$propiedad = Propiedad::where('name','=',$propiedad->name)->first();
			$image->propiedad_id = $propiedad->id;
			$image->save();   
			$collection = $propiedad->images()->getEager();
			$collection->add($image);
        return view('listarPropiedades')->with('propiedades',Propiedad::all());
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
            'name'=>'required|min:2|max:20|unique:propiedades',
            'locate'=>'required|min:5',
        ]);
        if($validatedData>0){ 
			$propiedad = Propiedad::where('id','=',$id)->first();
			$propiedad->name =$request->Input('name');
			$propiedad->description= $request->Input('description');
			$propiedad->locate = $request->Input('locate'); 
			$propiedad->save(); 
			return view('listarPropiedades')->with('propiedades',Propiedad::all());
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
        $propiedad= Propiedad::find($id);
        $propiedad->delete();
        return view('listarPropiedades')->with('propiedades',Propiedad::all());
    }

    public function destroy(propiedad $propiedad)
    {
        //
    }
	
}
