<?php

namespace App\Http\Controllers\Admin\Boiler;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Boiler\Boiler\StoreRequest;
use App\Http\Requests\Admin\Boiler\Boiler\UpdateRequest;
use App\Models\Boiler;
use App\Models\BoilerFuel;
use App\Models\Source;

class BoilerController extends Controller
{
    public function index()
    {
        $boilers = Boiler::all();

        return view('admin.boiler.boiler.index', compact('boilers'));
    }

    public function create()
    {
        $sources = Source::all();
        $boiler_fuels = BoilerFuel::all();

        return view('admin.boiler.boiler.create', compact('sources', 'boiler_fuels'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Boiler::firstOrCreate($data);

        return redirect()->route('admin.boiler.index');
    }

    public function show(Boiler $boiler)
    {
        return view('admin.boiler.boiler.show', compact('boiler'));
    }

    public function edit(Boiler $boiler)
    {
        $sources = Source::all();
        $boiler_fuels = BoilerFuel::all();

        return view('admin.boiler.boiler.edit', compact('boiler', 'sources', 'boiler_fuels'));
    }

    public function update(UpdateRequest $request, Boiler $boiler)
    {
        $data = $request->validated();

        $boiler->update($data);

        return redirect()->route('admin.boiler.index');
    }

    public function destroy(Boiler $boiler)
    {
        $boiler->deleteOrFail();

        return redirect()->route('admin.boiler.index');
    }
}
