<?php

namespace App\Http\Controllers\Admin\HeatingPipeline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeatingPipeline\StoreRequest;
use App\Http\Requests\Admin\HeatingPipeline\UpdateRequest;
use App\Models\HeatingPipeline;
use App\Models\Source;
use Illuminate\Http\Request;

class HeatingPipelineController extends Controller
{
    public function index()
    {
        $heating_pipelines = HeatingPipeline::all();

        return view('admin.heating_pipeline.index', compact('heating_pipelines'));
    }

    public function create()
    {
        $data['sources'] = Source::all();
        $data['pipe_diameters'] = HeatingPipeline::getPipeDiameters();
        $data['purpose_types'] = HeatingPipeline::getPurposeTypes();
        $data['laying_types'] = HeatingPipeline::getLayingTypes();
        $data['ins_types'] = HeatingPipeline::getInsTypes();
        $data['ins_conditions'] = HeatingPipeline::getInsConditions();

        return view('admin.heating_pipeline.create', compact('data'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        HeatingPipeline::firstOrCreate($data);

        return redirect()->route('admin.heating_pipeline.index');
    }

    public function show(HeatingPipeline $heating_pipeline)
    {
        return view('admin.heating_pipeline.show', compact('heating_pipeline'));
    }

    public function edit(HeatingPipeline $heating_pipeline)
    {
        $data['sources'] = Source::all();
        $data['pipe_diameters'] = HeatingPipeline::getPipeDiameters();
        $data['purpose_types'] = HeatingPipeline::getPurposeTypes();
        $data['laying_types'] = HeatingPipeline::getLayingTypes();
        $data['ins_types'] = HeatingPipeline::getInsTypes();
        $data['ins_conditions'] = HeatingPipeline::getInsConditions();

        return view('admin.heating_pipeline.edit', compact('heating_pipeline', 'data'));
    }

    public function update(UpdateRequest $request, HeatingPipeline $heating_pipeline)
    {
        $data = $request->validated();
        $heating_pipeline->update($data);

        return redirect()->route('admin.heating_pipeline.index');
    }

    public function destroy(HeatingPipeline $heating_pipeline)
    {
        $heating_pipeline->deleteOrFail();

        return redirect()->route('admin.heating_pipeline.index');
    }
}
