<?php

namespace sisWeb\Http\Controllers;

use sisWeb\propiedad;
use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    



    public function registrarUnaPropiedad() {
  }


    public function index()
    {

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
        $locateiedad = new prolocatead;
        $image= new image;
        $propiedad->name = Input::get('name');
        $propiedad->description = Input::get('description');
        $propiedad->locate = Input::get('locate'); 
        $image->archiveName = Input::get('name');
        $image->propiedad_id = $propiedad->id;
        $propiedad->save();
        $image->save();
        $propiedades->images()->associate($image);
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
