<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Propiedad;
use Illuminate\Http\Request;
use sisWeb\Image;

class PropiedadController extends Controller
{
    



    public function registrarUnaPropiedad() {
  }


    public function index()
    {
        return view('listarPropiedades');
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
            'name'=>'required|min:2|unique:propiedades',
            'locate'=>'required|min:5',
        ]);
        $files = array();
        foreach($request->file('images')as $file ){
            array_push($files, $file);
        }
        foreach ($files as $i => $file) {
           dd($files[$i]);
        }
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
        return view('indexIngenieria');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(propiedad $propiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(propiedad $propiedad)
    {
         return view('modificarPropiedad');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, propiedad $propiedad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(propiedad $propiedad)
    {
        //
    }
}
