<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Puja;
use sisWeb\Subasta;
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
    public function create()
    {
        
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
            'monto'=>'required',
        ]);
        if($validatedData){
            $subasta=Subasta::where('id','=',$request->subasta_id)->first();
            if($subasta->finalPrice < $request->Input('monto')){ 
                $subasta->finalPrice= $request->Input('monto');
                $subasta->save();
                if($puja=Puja::where('user_id','=',session('id'))->where('subasta_id','=', $request->subasta_id)== null){
				     $puja = new Puja;
                     $puja->subasta_id= $subasta->id;
                     $puja->monto = $request->Input('monto');
                     $puja->user_id = session('id');    
                 }else
                  $puja->monto=$request->monto;
                $puja->save();
                return back();
            }else{
                return back()->withErrors(['el monto ingresado debe ser mayor al monto actual']);
            }
        }
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
