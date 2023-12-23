<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\Source\StoreRequest;
use App\Http\Requests\Admin\Source\Source\UpdateRequest;
use App\Models\Source\CityDistrict;
use App\Models\Source\Source;
use App\Models\Source\SourceFuel;
use App\Models\Source\SourceType;
use App\Models\User;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::all();

        return view('admin.source.source.index', compact('sources'));
    }

    public function create()
    {
        $city_districts = CityDistrict::all();
        $source_fuels = SourceFuel::all();
        $source_types = SourceType::all();
        $users = User::all();

        return view('admin.source.source.create', compact(
            'city_districts',
            'source_fuels',
            'source_types',
            'users'
        ));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['connected_power'] = floatval($data['connected_power']);

        Source::firstOrCreate($data);

        return redirect()->route('admin.source.index');
    }

    public function show(Source $source)
    {
        return view('admin.source.source.show', compact('source'));
    }

    public function edit(Source $source)
    {

        $city_districts = CityDistrict::all();
        $source_fuels = SourceFuel::all();
        $source_types = SourceType::all();
        $users = User::all();

        return view('admin.source.source.edit', compact(
            'city_districts',
            'source_fuels',
            'source_types',
            'users',
            'source'
        ));
    }

    public function update(UpdateRequest $request, Source $source)
    {
        $data = $request->validated();

        $data['connected_power'] = floatval($data['connected_power']);

        $source->update($data);

        return redirect()->route('admin.source.index');
    }

    public function destroy(Source $source)
    {
        $source->deleteOrFail();

        return redirect()->route('admin.source.index');
    }
}
