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
            'userName'=>'required',
            'dni'=>'required',
            'creditCardNumber'=>'required',
            'creditCardCode'=>'required',
            'birthDay'=>'required',
        ]);

        if($validatedData){
			$user = new User($request->all());  
			$user->creditCard = 'visa';
			$user->userType='comun';
		}

        $user->save();
        return view('IniciarSesion')-> with ('user', $user);
        }
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
    public function edit($id)
    {
        $user= new User;
        $user = User::where('id','=',$id)->first();
        return view('ModificarUsuario')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $validatedData = $request -> validate([
            'mail'=>'required',
            'userName'=>'required|min:6|max:20',
            'secondName'=>'required|min:2|max:20',
            'name'=>'required|min:2',
            'password'=>'required|min:6',
        ]);
        if($validatedData){
			$user = User::where('id','=',$id)->first();
			if($user->mail != $request->mail){
				$validarMail = $request -> validate([ 'mail' => 'unique:users']);
				if($validarMail){
				}
			}
		    $user->mail = $request->mail; 
			$user->userName = $request->userName; 
			$user->secondName = $request->secondName; 
			$user->name = $request->name; 	
			$user->password = $request->password;  
			$user->creditCard = 'visa';
			$user->userType='comun';      
		}
        $user->save();
        return view('indexIngenieria')-> with ('user', $user);   
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
