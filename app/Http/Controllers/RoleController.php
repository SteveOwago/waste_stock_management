<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:Admin','permission:permissions-management']);
    }
    public function index()
    {
        $roles = Role::with('permissions')->get();;

        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
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
            'name'=> 'required|string',
        ]);
        $role = Role::create([
            'name'=>$request->name,
        ]);
        $permissions = $request->permissions;

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->withStatus('Role Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();


        return view('roles.edit',compact('role','permissions'));
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
            'name' => 'required|string',
        ]);

        $role->update($request->all());
        //Unlink All Permissions
        foreach ($role->permissions() as $permission){
            $role->revokePermissionTo($permission);
        }
        //Link New Permissions
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->withStatus('Role Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $permisssions = $role->permissions;
        $role->revokePermissionTo($permisssions);
        $role->delete();
        return back()->withStatus('Role Removed successfully.');

    }
}
