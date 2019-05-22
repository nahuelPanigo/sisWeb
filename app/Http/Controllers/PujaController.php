<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Puja;
use Illuminate\Http\Request;

class PujaController extends Controller
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
    public function create(Request $request)
    {
         $validatedData = $request -> validate([
            'monto'=>'required|',
        ]);
        if($validatedData>0){
        $subasta= new Subasta; 
        $subasta->finalPrice= $request->Input('monto');
        $puja =new Puja;
        $puja->user_id= 
        $puja->subasta_id= $subasta->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function show(Puja $puja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function edit(Puja $puja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puja $puja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puja $puja)
    {
        //
    }
}
