<?php

namespace App\Http\Controllers;

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
        $data = $request->all();
        $response = Sisestamine::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $response
        ], 200);
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
            'ladu' => $sisestamine,
            ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sisestamine $sisestamine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sisestamine $sisestamine)
    {
        //
    }
}
