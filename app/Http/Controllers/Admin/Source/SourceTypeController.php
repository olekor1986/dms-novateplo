<?php

namespace App\Http\Controllers\Admin\Source;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\SourceType\StoreRequest;
use App\Http\Requests\Admin\Source\SourceType\UpdateRequest;
use App\Models\SourceType;
use Illuminate\Http\Request;

class SourceTypeController extends Controller
{
    public function index()
    {
        $source_types = SourceType::all();

        return view('admin.source.source_type.index', compact('source_types'));
    }

    public function create()
    {
        return view('admin.source.source_type.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        SourceType::firstOrCreate($data);

        return redirect()->route('admin.source_type.index');
    }

    public function show(SourceType $source_type)
    {
        return view('admin.source.source_type.show', compact('source_type'));
    }

    public function edit(SourceType $source_type)
    {
        return view('admin.source.source_type.edit', compact('source_type'));
    }

    public function update(UpdateRequest $request, SourceType $source_type)
    {
        $data = $request->validated();

        $source_type->update($data);

        return redirect()->route('admin.source_type.index');
    }

    public function destroy(SourceType $source_type)
    {
        $source_type->deleteOrFail();

        return redirect()->route('admin.source_type.index');
    }
}
