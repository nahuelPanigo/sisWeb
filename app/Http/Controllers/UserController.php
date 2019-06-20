<?php

namespace sisWeb\Http\Controllers;
use validator;
use sisWeb\User;
use Illuminate\Http\Request;
use DateTime;
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
            $newformat= DateTime::createFromFormat('Y-m-d',$request->birthDay); 
            $interval = date_diff(new DateTime(),$newformat);
            if( $interval->days > 6570){
                if($request->password == $request->secondPassword){
					$user = new User($request->all());  
					$user->creditCard = 'visa';
					$user->userType='comun';
				}else{
					return back()->withInput()->withErrors('las contrasenias ingresadas deben ser iguales');
				}
			}else{
            return back()->withInput()->withErrors('Debe ser mayor de 18 anios');
          }
        }

        $user->save();
        return view('IniciarSesion')-> with ('user', $user);
      }
    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    { //
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
			'secondPasword' => 'required',
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
    public function destroy($id)
    {
        if($user->puedoEliminarme($id)){
            $user->delete();
            return redirect('/');
        }else{
            return back()->withErrors('no pudo eliminarse su cuenta tiene reservas y/o subastas y/o hotsales pendientes');
        }
    }
}
