<?php

namespace sisWeb\Http\Controllers;
use sisWeb\User;
use Illuminate\Http\Request;
use Validator;

class sesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('IniciarSesion');
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
    public function store(Request $request){
        $user2 = new User;
        $user2 = User::where('mail','=', $request->mail)->first();
        if(is_null($user2)){
			return back()->withInput()->withErrors(['el email y/o la contraseña son invalidos']);
		}else{
			if(($user2->password == $request->password) and ( $user2->mail == $request->mail)){
				$request->session()->put('id', $user2->id);
				return view('indexIngenieria');
			}
			return back()->withInput()->withErrors(['el email y/o la contraseña son invalidos']);
		}
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
