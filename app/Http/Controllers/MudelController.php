<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Mudel;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class MudelController extends Controller
{
    public function index()
    {
        return Inertia::render('Mudel/Index', [
            'mudel' => Mudel::all(),
            'devices' => Device::all(),
        ]);
    }

    public function create() {
        return Inertia::render('Mudel/Create', [
        ]);
    }

    public function store(Request $request) {
        Validator::make($request->all(), [
            'title' => 'required|max:255',
        ])->validate();
    
        $title = $request->input('title');

        // Mudel::create([
        //     'title' => $request['title'],
        // ]);
        Mudel::create([
            'title' => $request['title'],
            'device_id' => $request['device_id']
        ]);

        return redirect()->route('sisestamine');

    }
}

