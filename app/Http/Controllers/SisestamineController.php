<?php

namespace App\Http\Controllers;

use App\Models\Ladu;
use App\Models\Sisestamine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Contracts\Service\Attribute\Required;

class SisestamineController extends Controller  
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Sisestamine/Index', [
            'sisestamine' => Sisestamine::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Sisestamine $sisestamine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sisestamine $sisestamine)
    {
        return Inertia::render('ladu.edit', [
            'sisestamine' => $sisestamine,
            'ladu' => Ladu::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sisestamine $sisestamine)
    {
        $request->validate([
            'SN' => 'required',
            'device' => 'required',
            'mudel' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'shelf' => 'required',
            'shop' => 'required',
            'image_path' => 'required|image',
        ]);
    
        Storage::delete($sisestamine->image_path);
        $path = Storage::putFile('ladu', $request->file('image_path'));

        $sisestamine->update([
            'SN' => $request['SN'],
            'device' => $request['device'],
            'mudel' => $request['mudel'],
            'description' => $request['description'],
            'condition' => $request['condition'],
            'shelf' => $request['shelf'],
            'shop' => $request['shop'],
            'image_path' => $path,
        ]);

    return redirect()->route('ladu.index');   
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sisestamine $sisestamine)
    {
        Storage::delete($sisestamine->image_path);
        $sisestamine->delete();
        return redirect()->route('ladu.index');
    }
}
