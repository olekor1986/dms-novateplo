<?php

namespace App\Http\Controllers\Admin\SparePart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SparePart\MechanicalSeal\StoreRequest;
use App\Http\Requests\Admin\SparePart\MechanicalSeal\UpdateRequest;
use App\Models\MechanicalSeal;

class MechanicalSealController extends Controller
{
    public function index()
    {
        $mechanical_seals = MechanicalSeal::all();

        return view('admin.spare_part.mechanical_seal.index', compact('mechanical_seals'));
    }

    public function create()
    {
        return view('admin.spare_part.mechanical_seal.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        MechanicalSeal::firstOrCreate($data);

        return redirect()->route('admin.mechanical_seal.index');
    }

    public function show(MechanicalSeal $mechanical_seal)
    {
        return view('admin.spare_part.mechanical_seal.show', compact('mechanical_seal'));
    }

    public function edit(MechanicalSeal $mechanical_seal)
    {
        return view('admin.spare_part.mechanical_seal.edit', compact('mechanical_seal'));
    }

    public function update(UpdateRequest $request, MechanicalSeal $mechanical_seal)
    {
        $data = $request->validated();

        $mechanical_seal->update($data);

        return redirect()->route('admin.mechanical_seal.index');
    }

    public function destroy(MechanicalSeal $mechanical_seal)
    {
        $mechanical_seal->deleteOrFail();

        return redirect()->route('admin.mechanical_seal.index');
    }
}
