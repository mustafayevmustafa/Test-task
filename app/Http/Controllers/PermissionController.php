<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\ProdoctRequest;
use App\Models\Permission;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function index()
    {
        return view('Admin.permissions.index')->with([
            'permissions' => Permission::paginate(10)
        ]);
    }


    public function create()
    {
        return view('Admin.permissions.edit')->with([
            'action' => route('permissions.store'),
            'method' => null,
            'data'   => null
        ]);
    }


    public function store(PermissionRequest $request) : RedirectResponse
    {
        $validated = $request->validated();
        $permission = Permission::create($validated);

        return redirect()->route('permissions.index')->with('success', "Permission {$permission->getAttribute('name')} created successfully! ");

    }


    public function show(Permission $permission)
    {
        return view('Admin.permissions.edit')->with([
            'method' => null,
            'action' => null,
            'data' =>$permission
        ]);
    }


    public function edit(Permission $permission)
    {
        return view('Admin.permissions.edit')->with([
            'action' => route('permissions.update', $permission),
            'method' => 'PUT',
            'data' => $permission,
        ]);
    }


    public function update(PermissionRequest $request, Permission $permission)
    {
        $validate = $request->validated();
        $permission->update($validate);

        return redirect()->route('permissions.index')->with('success', "Permissions {$permission->getAttribute('name')} updated");

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission delete successfully.'));


    }
}
