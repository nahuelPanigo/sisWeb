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
        $usuarios = User::all();
        return view('listarSolicitudes')->with('usuarios',$usuarios);
    }
    public function listarUsuarios(){
		$usuarios = User::all();
		return view('listarUsuarios')->with('usuarios',$usuarios);
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
            $cumpleanos = DateTime::createFromFormat('Y-m-d',$request->birthDay); 
            $hoy = new DateTime();
            $annos = $hoy->diff($cumpleanos);
            if( ($annos->format('%Y'))>= 18){
                if($request->password == $request->secondPassword){
					$user = new User($request->all());  
					$user->creditCard = 'visa';
					$user->userType='comun';
                    $user->deleted=false;
                    $user->save();
				}else{
					return back()->withInput()->withErrors('las contrasenias ingresadas deben ser iguales');
				}
			}else{
            return back()->withInput()->withErrors('Debe ser mayor de 18 anios');
          }
        }
        return view('IniciarSesion')-> with ('user', $user);
      }
    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $user = new User;
        $user = User::where('id','=',$id)->first();
        return view('perfil')->with('reservas',$user->misReservas($id))->with('subastas',$user->misSubastas($id))->with('user',$user);
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
			if($request->password == $request->secondPassword){
				$user->mail = $request->mail; 
				$user->userName = $request->userName; 
				$user->secondName = $request->secondName; 
				$user->name = $request->name; 	
				$user->password = $request->password;  
				$user->creditCard = 'visa';
				$user->userType='comun'; 
                $user->deleted=false; 
				$user->save();
				return redirect ('/inicio')-> with('user', $user); 
			}else{
				return redirect ('/admin/users/'.$id.'/edit')->withInput()->withErrors('las contrasenias ingresadas deben ser iguales');
			}  
		}
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisWeb\User  $user
     * @return \Illuminate\Http\Response
     */
public function delete($id){
            $user=new User;
            $user->eliminar($id);
            return redirect('/');
}

    public function destroy($id)
    {
       
}
}