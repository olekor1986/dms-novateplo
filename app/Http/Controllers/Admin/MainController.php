<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boiler;
use App\Models\Pump;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data = [];

        $data['users'] = User::all()->count();

        $data['sources'] = Source::all()->count();

        $data['boilers'] = Boiler::all()->count();

        $data['pumps'] = Pump::all()->count();

        return view('admin.main.index', compact('data'));
    }
}
