<?php

namespace App\Http\Controllers;

use App\Persona;
use App\PersonasEmpleados;
use App\PersonasNaturales;
use App\User;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }
    public function create()
    {
        //$perNatural=PersonasNaturales::all();
        $persona=Persona::where('juridica_id','=',null)->get();
        $roles = Role::get();
        //dd($permissions);
        //$perEmpleado=PersonasEmpleados::all();
        return view('user.create',compact('roles','persona'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'email' => 'required|unique:users|email',
            'password' => 'required|max:10|min:4',
        ]);

        $users=User::create([
            'email'=> $request['email'],
            'persona_id'=> $request['persona_id'],
            'nombreCompleto'=> $request['nombreCompleto'],
            'password'=> bcrypt($request['password']),
        ]);
        $users->roles()->sync($request->get('roles'));

        Session::flash('message','El registro se agrero con Exito');
            return redirect()->route('users.index');

    }

    public function show($id)
    {
        $users=User::find($id);
        return view('user.show',compact('users'));
    }

    public function edit($id)
    {
        $users=User::find($id);
        $roles = Role::get();
        //dd($personajuridica);
        /*  return view('terceros.naturales.edit', compact('personaNatural','departamentos',
              'claseP','descriptoresnCiiu','tipoDoc'));*/
        return view('user.edit',compact('users','roles'));
    }

    public function update(Request $request, $id)
    {
        $users=User::find($id);

        $users->email= $request->email;
        $users->persona_id= $request->persona_id;
        $users->nombreCompleto= $request->nombreCompleto;
        //dd($personajuridica);
        $users->roles()->sync($request->get('roles'));
        $users->save();

        if ($users) {
            Session::flash('message','El registro se edito con exito');
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.index');
        }
    }

}
