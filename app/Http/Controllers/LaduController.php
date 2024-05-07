<?php

namespace App\Http\Controllers;

use App\Models\Ladu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        return Inertia::render('Ladu/Edit', [
            'ladu' => $ladu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request, Ladu $ladu)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();

        Ladu::find($id)->update($request->all());
        return redirect()->route('ladu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Ladu $ladu)
    {
        Ladu::find($id)->delete();
        Storage::delete($ladu->image_path);
        return redirect()->route('ladu.index');
    }
}
