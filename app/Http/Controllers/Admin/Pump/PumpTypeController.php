<?php

namespace App\Http\Controllers\Admin\Pump;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pump\PumpType\StoreRequest;
use App\Http\Requests\Admin\Pump\PumpType\UpdateRequest;
use App\Models\PumpType;

class PumpTypeController extends Controller
{
    public function index()
    {
        $pump_types = PumpType::all();

        return view('admin.pump.pump_type.index', compact('pump_types'));
    }

    public function create()
    {
        return view('admin.pump.pump_type.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        PumpType::firstOrCreate($data);

        return redirect()->route('admin.pump_type.index');
    }

    public function show(PumpType $pump_type)
    {
        return view('admin.pump.pump_type.show', compact('pump_type'));
    }

    public function edit(PumpType $pump_type)
    {
        return view('admin.pump.pump_type.edit', compact('pump_type'));
    }

    public function update(UpdateRequest $request, PumpType $pump_type)
    {
        $data = $request->validated();

        $pump_type->update($data);

        return redirect()->route('admin.pump_type.index');
    }

    public function destroy(PumpType $pump_type)
    {
        $pump_type->deleteOrFail();

        return redirect()->route('admin.pump_type.index');
    }
}
