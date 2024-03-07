<?php

namespace App\Http\Controllers\Admin\WaterMeter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WaterMeter\WaterMeter\StoreRequest;
use App\Http\Requests\Admin\WaterMeter\WaterMeter\UpdateRequest;
use App\Models\Source;
use App\Models\WaterMeter;

class WaterMeterController extends Controller
{
    public function index()
    {
        $water_meters = WaterMeter::all();

        return view('admin.water_meter.water_meter.index', compact('water_meters'));
    }

    public function create()
    {
        $data['sources'] = Source::all();
        $data['diameters'] = WaterMeter::getWaterMeterDiameters();
        $data['purposes'] = WaterMeter::getWaterMeterPurposeTypes();
        $data['conditions'] = WaterMeter::getWaterMeterConditionTypes();

        return view('admin.water_meter.water_meter.create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        WaterMeter::firstOrCreate($data);

        return redirect()->route('admin.water_meter.index');
    }

    public function show(WaterMeter $water_meter)
    {
        return view('admin.water_meter.water_meter.show', compact('water_meter'));
    }

    public function edit(WaterMeter $water_meter)
    {
        $data['sources'] = Source::all();
        $data['diameters'] = WaterMeter::getWaterMeterDiameters();
        $data['purposes'] = WaterMeter::getWaterMeterPurposeTypes();
        $data['conditions'] = WaterMeter::getWaterMeterConditionTypes();

        return view('admin.water_meter.water_meter.edit', compact('water_meter', 'data'));
    }

    public function update(UpdateRequest $request, WaterMeter $water_meter)
    {
        $data = $request->validated();

        $water_meter->update($data);

        return redirect()->route('admin.water_meter.index');
    }

    public function destroy(WaterMeter $water_meter)
    {
        $water_meter->deleteOrFail();

        return redirect()->route('admin.water_meter.index');
    }
}
