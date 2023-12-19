<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Staff\StoreRequest;
use App\Http\Requests\Admin\Staff\UpdateRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();

        return view('admin.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Staff::firstOrCreate($data);

        return redirect()->route('admin.staff.index');
    }

    public function show(Staff $staff)
    {
        return view('admin.staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(UpdateRequest $request, Staff $staff)
    {
        $data = $request->validated();

        $staff->update($data);

        return redirect()->route('admin.staff.index');
    }

    public function destroy(Staff $staff)
    {
        $staff->deleteOrFail();

        return redirect()->route('admin.staff.index');
    }
}
