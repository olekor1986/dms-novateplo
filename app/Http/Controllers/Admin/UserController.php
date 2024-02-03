<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $staffs = Staff::all();
        $roles = Role::all();
        return view('admin.user.create', compact('staffs', 'roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::putFile('public/images/avatars', $data['avatar']);
        }

        $data['password'] = Hash::make($data['password']);

        $data['banned'] = false;

        User::firstOrCreate($data);

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        $sources = $user->sources()->orderBy('in_work')->orderBy('source_type_id')->get();

        return view('admin.user.show', compact('user', 'sources'));
    }

    public function edit(User $user)
    {
        $staffs = Staff::all();
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'staffs', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::putFile('public/images/avatars', $data['avatar']);
        }

        $user->update($data);

        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $user->deleteOrFail();

        return redirect()->route('admin.user.index');
    }
}
