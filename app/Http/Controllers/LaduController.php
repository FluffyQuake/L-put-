<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Mudel;
use App\Models\Sisestamine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class LaduController extends Controller
{
    public function index()
    {
        // Eager loading the relationships for better performance
        $sisestamines = Sisestamine::with('device')->with('mudel')->get();
        
        return Inertia::render('Ladu/Index', [
            'sisestamines' => $sisestamines,
            'devices' => Device::all(),
            'mudels' => Mudel::all(),
        ]);
    }

    public function edit(Sisestamine $sisestamine)
    {
        return Inertia::render('Ladu/Edit', [
            'sisestamine' => $sisestamine->load('device', 'mudel'),
            'devices' => Device::all(),
            'mudels' => Mudel::all(),
        ]);
    }

    public function update(Request $request, Sisestamine $sisestamine)
    {
        $request->validate([
            'SN' => 'required',
            'device_id' => 'required',
            'mudel_id' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'shelf' => 'required',
            'shop' => 'required',
            'image_path' => 'nullable|image|max:10240', // Adjusted image validation
        ]);

        // Handle image upload
        if ($request->hasFile('image_path')) {
            Storage::delete($sisestamine->image_path); // Delete old image
            $path = $request->file('image_path')->store('public/ladu'); // Store new image
        } else {
            $path = $sisestamine->image_path; // Keep existing image path
        }

        $sisestamine->update([
            'SN' => $request->SN,
            'device_id' => $request->device_id,
            'mudel_id' => $request->mudel_id,
            'description' => $request->description,
            'condition' => $request->condition,
            'shelf' => $request->shelf,
            'shop' => $request->shop,
            'image_path' => $path,
        ]);

        return redirect()->route('ladu.index');
    }

    public function destroy(Sisestamine $sisestamine)
    {
        Storage::delete($sisestamine->image_path); // Delete associated image
        $sisestamine->delete(); // Delete the record

        return redirect()->route('ladu.index');
    }
}
