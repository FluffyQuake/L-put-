<?php

namespace App\Http\Controllers;

use App\Models\Sisestamine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SisestamineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia:: render('Sisestamine/Index', [
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
        Sisestamine::create($request->validate([
            '' => ['required', 'max:50'],
            '' => ['max:50'],        
            '' => ['max:50'],        
        ]));

        return to_route('ladu.index');
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
        //
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
