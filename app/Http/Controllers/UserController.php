<?php

namespace sisWeb\Http\Controllers;
use validator;
use sisWeb\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
   


   


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
        return view('registrarUsuario');
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
            'mail'=>'required|unique:users',
            'userName'=>'required|min:6|max:20',
            'secondName'=>'required|min:2|max:20',
            'name'=>'required|min:2',
            'password'=>'required|min:6',
        ]);
        if($validatedData){
        $user = new User($request->all());
        $user->password = bcrypt($request->password);  
        $user->creditCard = 'visa';
        $user->userType='comun';      }
        $user->save();
        dd($user);
        }
    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
