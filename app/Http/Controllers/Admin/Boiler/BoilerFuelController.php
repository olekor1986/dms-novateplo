<?php

namespace App\Http\Controllers\Admin\Boiler;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Boiler\BoilerFuel\StoreRequest;
use App\Http\Requests\Admin\Boiler\BoilerFuel\UpdateRequest;
use App\Models\BoilerFuel;

class BoilerFuelController extends Controller
{
    public function index()
    {
        $boiler_fuels = BoilerFuel::all();

        return view('admin.boiler.boiler_fuel.index', compact('boiler_fuels'));
    }

    public function create()
    {
        return view('admin.boiler.boiler_fuel.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        BoilerFuel::firstOrCreate($data);

        return redirect()->route('admin.boiler_fuel.index');
    }

    public function show(BoilerFuel $boiler_fuel)
    {
        return view('admin.boiler.boiler_fuel.show', compact('boiler_fuel'));
    }

    public function edit(BoilerFuel $boiler_fuel)
    {
        return view('admin.boiler.boiler_fuel.edit', compact('boiler_fuel'));
    }

    public function update(UpdateRequest $request, BoilerFuel $boiler_fuel)
    {
        $data = $request->validated();

        $boiler_fuel->update($data);

        return redirect()->route('admin.boiler_fuel.index');
    }

    public function destroy(BoilerFuel $boiler_fuel)
    {
        $boiler_fuel->deleteOrFail();

        return redirect()->route('admin.boiler_fuel.index');
    }
}
