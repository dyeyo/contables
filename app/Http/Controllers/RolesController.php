<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::paginate();
        return view('extras.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        //dd($permissions);
        return view('extras.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));
        //dd($role);

        return redirect()->route('roles.index', $role->id)
            ->with('info', 'Rol guardado con éxito');
    }

    public function show($id)
    {
        $role = Role::find($id);
        return view('extras.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $permissions = Permission::get();

        return view('extras.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index', $role->id)
            ->with('info', 'Rol guardado con éxito');
    }

    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
