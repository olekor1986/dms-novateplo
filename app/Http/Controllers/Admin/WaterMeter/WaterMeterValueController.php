<?php

namespace App\Http\Controllers\Admin\WaterMeter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WaterMeter\WaterMeterValue\StoreRequest;
use App\Http\Requests\Admin\WaterMeter\WaterMeterValue\UpdateRequest;
use App\Models\WaterMeter;
use App\Models\WaterMeterValue;
use Illuminate\Http\Request;

class WaterMeterValueController extends Controller
{
    public function index()
    {
        $water_meter_values = WaterMeterValue::all();

        return view('admin.water_meter.water_meter_value.index', compact('water_meter_values'));
    }

    public function create()
    {
        $data['water_meters'] = WaterMeter::all();

        return view('admin.water_meter.water_meter_value.create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $water_meter_value = WaterMeterValue::firstOrCreate($data);

        return redirect()->route('admin.water_meter.show', $water_meter_value->water_meter_id);
    }

    public function show(WaterMeterValue $water_meter_value)
    {
        return view('admin.water_meter.water_meter_value.show', compact('water_meter_value'));
    }

    public function edit(WaterMeterValue $water_meter_value)
    {
        return view('admin.water_meter.water_meter_value.edit', compact('water_meter_value'));
    }

    public function update(UpdateRequest $request, WaterMeterValue $water_meter_value)
    {
        $data = $request->validated();

        $water_meter_value->update($data);

        return redirect()->route('admin.water_meter.show', $water_meter_value->water_meter_id);
    }

    public function destroy(WaterMeterValue $water_meter_value)
    {
        $water_meter_value->deleteOrFail();

        return redirect()->route('admin.water_meter_value.index');
    }
}
