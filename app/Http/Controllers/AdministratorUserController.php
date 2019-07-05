<?php

namespace sisWeb\Http\Controllers;

use sisWeb\AdministratorUser;
use Illuminate\Http\Request;
use sisWeb\Solicitud;
use sisWeb\User;
class AdministratorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminIndexIngenieria');
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
    public function store(Request $request){
        $user2 = new AdministratorUser;
        $user2 = AdministratorUser::where('mail','=', $request->mail)->first();
        if(is_null($user2)){
			return back()->withInput()->withErrors(['el email y/o la contraseña son invalidos']);
		}else{
			if(($user2->password == $request->password) and ( $user2->mail == $request->mail)){
				$request->session()->put('id', $user2->id);
				return view('adminindexIngenieria');
			}
			return back()->withInput()->withErrors(['el email y/o la contraseña son invalidos']);
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  \sisWeb\AdministratorUser  $administratorUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdministratorUser $administratorUser)
    {
        
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
   
    public function solicitudes($id){
         $solicitud=Solicitud::where('user_id','=',$id)->first();
         if(($solicitud != NULL)and($solicitud->view == false)){
            return back()->withErrors('Su solicitud ya ha sido enviada previamente');
        }else{
            if($solicitud != NULL){
                $solicitud->view = false;
                $solicitud->save(); 
            }else{
                $solicitud= new Solicitud;
                $solicitud->user_id=$id;
                $solicitud->view=false;
                $solicitud->save();
            }
       }
    return redirect('/inicio');
    }
   
    public function listarSolicitudes(){
        $solicitudes = Solicitud::where('view','=',false)->get();
        $usuarios=collect([]);
        
        foreach ($solicitudes as $solicitud) {
            $usuario = User::where('id','=',$solicitud->user_id)->first();
            $usuarios->push($usuario);
    }   
        
         return view('listarSolicitudes')->with('usuarios',$usuarios);
    }

    public function aceptarSolicitud($id){
         $user= User::find($id);
        $user->userType= 'vip';
        $user->save();
        $solicitud=Solicitud::where('user_id','=',$user->id)->first();
        $solicitud->view= true;
        $solicitud->save();
        return back();
    }
    
    public function rechazarSolicitud($id){
         $user= User::find($id);
        $solicitud=Solicitud::where('user_id','=',$user->id)->first();
        $solicitud->view= true ;
        $solicitud->save();
        return back();
    }
}
