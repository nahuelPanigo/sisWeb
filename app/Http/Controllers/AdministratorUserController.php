<?php

namespace sisWeb\Http\Controllers;

use sisWeb\AdministratorUser;
use Illuminate\Http\Request;

class AdministratorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminHeader');
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
     * @param  \sisWeb\AdministratorUser  $administratorUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdministratorUser $administratorUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\AdministratorUser  $administratorUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministratorUser $administratorUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\AdministratorUser  $administratorUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdministratorUser $administratorUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\AdministratorUser  $administratorUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministratorUser $administratorUser)
    {
        //
    }
}
