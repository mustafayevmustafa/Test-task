<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdoctRequest;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function index()
    {

        return view('Admin.roles.index')->with([
            'roles' => Role::with('permissions')->paginate(10),
        ]);

    }


    public function create()
    {
        return view('Admin.roles.edit')->with([
            'action' => route('roles.store'),
            'method' => null,
            'data' => new Role(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store(RoleRequest $request): RedirectResponse
    {

       // $role = Role::create($request->only('name'));

        $role = Role::create(['name' => $request->input('name')]);

        $role->permission()->attach($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', "Role {$role->getAttribute('name')} created successfully! ");

    }


    public function show(Role $role)
    {
        return view('Admin.roles.edit')->with([
            'method' => null,
            'action' => null,
            'data' => $role,
            'permissions' => Permission::get(),
        ]);
    }


    public function edit(Role $role)
    {
        return view('Admin.roles.edit')->with([
            'action' => route('roles.update', $role),
            'method' => 'PUT',
            'data' => $role,
            'permissions' => Permission::get(),
        ]);
    }


    public function update(RoleRequest $request, Role $role)
    {
        $validate = $request->only('name');
        $role->update($validate);

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', "Role {$role->getAttribute('name')} updated");
    }

    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect()->route('roles.index')
            ->withSuccess(__('Role delete successfully.'));
    }
}
