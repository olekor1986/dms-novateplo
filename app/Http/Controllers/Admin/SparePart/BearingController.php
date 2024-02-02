<?php

namespace App\Http\Controllers\Admin\SparePart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SparePart\Bearing\StoreRequest;
use App\Http\Requests\Admin\SparePart\Bearing\UpdateRequest;
use App\Models\Bearing;

class BearingController extends Controller
{
    public function index()
    {
        $bearings = Bearing::all();

        return view('admin.spare_part.bearing.index', compact('bearings'));
    }

    public function create()
    {
        return view('admin.spare_part.bearing.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Bearing::firstOrCreate($data);

        return redirect()->route('admin.bearing.index');
    }

    public function show(Bearing $bearing)
    {
        return view('admin.spare_part.bearing.show', compact('bearing'));
    }

    public function edit(Bearing $bearing)
    {
        return view('admin.spare_part.bearing.edit', compact('bearing'));
    }

    public function update(UpdateRequest $request, Bearing $bearing)
    {
        $data = $request->validated();

        $bearing->update($data);

        return redirect()->route('admin.bearing.index');
    }

    public function destroy(Bearing $bearing)
    {
        $bearing->deleteOrFail();

        return redirect()->route('admin.bearing.index');
    }
}
