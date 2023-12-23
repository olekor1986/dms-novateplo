<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\SourceFuel\StoreRequest;
use App\Http\Requests\Admin\Source\SourceFuel\UpdateRequest;
use App\Models\Source\SourceFuel;

class SourceFuelController extends Controller
{
    public function index()
    {
        $source_fuels = SourceFuel::all();

        return view('admin.source.source_fuel.index', compact('source_fuels'));
    }

    public function create()
    {
        return view('admin.source.source_fuel.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        SourceFuel::firstOrCreate($data);

        return redirect()->route('admin.source_fuel.index');
    }

    public function show(SourceFuel $source_fuel)
    {
        return view('admin.source.source_fuel.show', compact('source_fuel'));
    }

    public function edit(SourceFuel $source_fuel)
    {
        return view('admin.source.source_fuel.edit', compact('source_fuel'));
    }

    public function update(UpdateRequest $request, SourceFuel $source_fuel)
    {
        $data = $request->validated();

        $source_fuel->update($data);

        return redirect()->route('admin.source_fuel.index');
    }

    public function destroy(SourceFuel $source_fuel)
    {
        $source_fuel->deleteOrFail();

        return redirect()->route('admin.source_fuel.index');
    }
}
