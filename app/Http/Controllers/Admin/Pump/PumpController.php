<?php

namespace App\Http\Controllers\Admin\Pump;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pump\Pump\StoreRequest;
use App\Http\Requests\Admin\Pump\Pump\UpdateRequest;
use App\Models\Pump;
use App\Models\Source;

class PumpController extends Controller
{
    public function index()
    {
        $pumps = Pump::all();

        return view('admin.pump.pump.index', compact('pumps'));
    }

    public function create()
    {
        $sources = Source::all();

        return view('admin.pump.pump.create', compact('sources'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Pump::firstOrCreate($data);

        return redirect()->route('admin.pump.index');
    }

    public function show(Pump $pump)
    {
        return view('admin.pump.pump.show', compact('pump'));
    }

    public function edit(Pump $pump)
    {
        $sources = Source::all();

        return view('admin.pump.pump.edit', compact('pump', 'sources'));
    }

    public function update(UpdateRequest $request, Pump $pump)
    {
        $data = $request->validated();

        $pump->update($data);

        return redirect()->route('admin.pump.index');
    }

    public function destroy(Pump $pump)
    {
        $pump->deleteOrFail();

        return redirect()->route('admin.pump.index');
    }
}
