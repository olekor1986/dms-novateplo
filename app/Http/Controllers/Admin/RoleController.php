<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Http\Requests\Admin\Role\UpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Role::firstOrCreate($data);

        return redirect()->route('admin.role.index');
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $data = $request->validated();

        $role->update($data);

        return redirect()->route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->deleteOrFail();

        return redirect()->route('admin.role.index');
    }
}
