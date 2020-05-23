<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions\Models\Role;
use App\Permissions\Models\Permiso; 

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->paginate(5);
        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permiso::get();
        return view('role.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:roles,nombre',
            'slug' => 'required|max:50|unique:roles,slug',
            'full-acceso' => 'required|in:si,no'
        ]);

        $role = Role::create($request->all());

        if($request->get('permiso')){
            $role->permisos()->sync($request->get('permiso'));
        }

        return redirect()->route('role.index')->with('status_success', 'Registro guardado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permiso_rol = [];
        foreach ($role->permisos as $permiso) {
            $permiso_rol[] = $permiso->id;
        }

        $permisos = Permiso::get();
        return view('role.view', compact('permisos', 'role', 'permiso_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permiso_rol = [];
        foreach ($role->permisos as $permiso) {
            $permiso_rol[] = $permiso->id;
        }

        $permisos = Permiso::get();
        return view('role.edit', compact('permisos', 'role', 'permiso_rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nombre' => 'required|max:50|unique:roles,nombre,' .$role->id,
            'slug' => 'required|max:50|unique:roles,slug,' .$role->id,
            'full-acceso' => 'required|in:si,no,' .$role->id
        ]);

        $role->update($request->all());

        if($request->get('permiso')){
            $role->permisos()->sync($request->get('permiso'));
        }

        return redirect()->route('role.index')->with('status_success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('status_success', 'Registro eliminado correctamente.');
    }
}
