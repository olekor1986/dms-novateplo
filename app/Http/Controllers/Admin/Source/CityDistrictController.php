<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\CityDistrict\StoreRequest;
use App\Http\Requests\Admin\Source\CityDistrict\UpdateRequest;
use App\Models\CityDistrict;

class CityDistrictController extends Controller
{
    public function index()
    {
        $city_districts = CityDistrict::all();

        return view('admin.source.city_district.index', compact('city_districts'));
    }

    public function create()
    {
        return view('admin.source.city_district.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        CityDistrict::firstOrCreate($data);

        return redirect()->route('admin.city_district.index');
    }

    public function show(CityDistrict $city_district)
    {
        return view('admin.source.city_district.show', compact('city_district'));
    }

    public function edit(CityDistrict $city_district)
    {
        return view('admin.source.city_district.edit', compact('city_district'));
    }

    public function update(UpdateRequest $request, CityDistrict $city_district)
    {
        $data = $request->validated();

        $city_district->update($data);

        return redirect()->route('admin.city_district.index');
    }

    public function destroy(CityDistrict $city_district)
    {
        $city_district->deleteOrFail();

        return redirect()->route('admin.city_district.index');
    }
}
