<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Mudel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DeviceController extends Controller
{
    public function index()
    {
        return Inertia::render('Device/Index', [
            'device' => Device::all(),
        ]);
    }

    public function create()
    {
        $mudel = Mudel::all();

        return Inertia::render('Device/Create', [
            'mudel' => $mudel,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        // dd($title);

        Device::create([
            'title' => $title,
        ]);

        return redirect()->route('device');
    }

}
