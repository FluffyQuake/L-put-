<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Mudel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        // $mudel = Mudel::all();

        return Inertia::render('Device/Create', [
            // 'mudel' => $mudel,
        ]);
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:255',
        ])->validate();

        
        // if ($validator->fails()) {
        //     return redirect('device/create')
        //                     ->withErrors($validator)
        //                     ->withInput();
        // }

        // $validated = $validator->$validated();

        $title = $request->input('title');
        
        // dd($title);
        Device::create([
            'title' => $request['title'],
        ]);
        
        return redirect()->route('sisestamine');
    }

}
