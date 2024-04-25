<?php

namespace App\Http\Controllers;

use App\Models\Ladu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class LaduController extends Controller
{
    public function index()
    {
        return Inertia::render('Ladu/Index', [
            'ladu' => Ladu::all(),
            
        ]);
    }

    public function edit(Ladu $ladu)
    {
        return Inertia::render('ladu.edit', [
            'ladu' => $ladu,
            ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ladu $ladu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ladu $ladu)
    {
        Storage::delete($ladu->image_path);
        $ladu->delete();
        return redirect()->route('ladu.index');

    }
}
