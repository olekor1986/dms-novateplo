<?php

namespace App\Http\Controllers\Admin\Boiler;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Boiler\BurnerType\StoreRequest;
use App\Http\Requests\Admin\Boiler\BurnerType\UpdateRequest;
use App\Models\BurnerType;

class BurnerTypeController extends Controller
{
    public function index()
    {
        $burner_types = BurnerType::all();

        return view('admin.boiler.burner_type.index', compact('burner_types'));
    }

    public function create()
    {
        return view('admin.boiler.burner_type.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        BurnerType::firstOrCreate($data);

        return redirect()->route('admin.burner_type.index');
    }

    public function show(BurnerType $burner_type)
    {
        return view('admin.boiler.burner_type.show', compact('burner_type'));
    }

    public function edit(BurnerType $burner_type)
    {
        return view('admin.boiler.burner_type.edit', compact('burner_type'));
    }

    public function update(UpdateRequest $request, BurnerType $burner_type)
    {
        $data = $request->validated();

        $burner_type->update($data);

        return redirect()->route('admin.burner_type.index');
    }

    public function destroy(BurnerType $burner_type)
    {
        $burner_type->deleteOrFail();

        return redirect()->route('admin.burner_type.index');
    }
}
