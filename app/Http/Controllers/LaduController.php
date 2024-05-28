<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Ladu;
use App\Models\Mudel;
use App\Models\Sisestamine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class LaduController extends Controller
{
    public function index()
    {
        // dd(Sisestamine::get());

        return Inertia::render('Ladu/Index', [
            'sisestamines' => Sisestamine::with('device')->with('mudel')->get(),
            'devices' => Device::all(),
            'mudels' => Mudel::all(),
        ]);
    }

    public function edit(Ladu $ladu)
    {
        return Inertia::render('Ladu/Edit', [
            'ladu' => $ladu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Ladu $ladu)
    {

        // Ladu::find($id)->update($request->all());
        // return redirect()->route('ladu');

        $request->validate([
            'SN' => 'required',
            'device_id' => 'required',
            'mudel_id' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'shelf' => 'required',
            'shop' => 'required',
            'image_path' => 'required|image',
        ]);
    
        Storage::delete($ladu->image_path);
        $path = Storage::putFile('ladu', $request->file('image_path'));

        $ladu->update([
            'SN' => $request['SN'],
            'device_id' => $request['device'],
            'mudel_id' => $request['mudel'],
            'description' => $request['description'],
            'condition' => $request['condition'],
            'shelf' => $request['shelf'],
            'shop' => $request['shop'],
            'image_path' => $path,
        ]);

    return redirect()->route('ladu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Ladu $ladu)
    {
        
    }
}
