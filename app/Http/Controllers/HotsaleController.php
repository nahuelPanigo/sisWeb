<?php

namespace sisWeb\Http\Controllers;

use sisWeb\Hotsale;
use Illuminate\Http\Request;

class HotsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotsales = Hotsale::all();
        return view('listarHotsales')->with('hotsales',$hotsales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
