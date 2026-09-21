<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CountiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counties = County::query()
            ->select('counties.name', 'counties.arms')
            ->selectRaw('SUM(cities.population) AS population')
            ->join('cities', 'cities.county_id', '=', 'counties.id')
            ->groupBy('counties.name', 'counties.arms')
            ->get();
        return view('counties.index', compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "arms" => "required|string"
        ]);

        $county = new County();
        $county->name = $request->name;
        $county->arms = $request->arms;
        $county->timestamps = false;
        $county->save();

        return redirect()->route('counties.index')->with('success', 'Megye sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $county = County::find($id);
        return view('counties.show', compact('county'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $county = County::find($id);
        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string",
            "arms" => "required|string"
        ]);

        $county = County::find($id);
        $county->name = $request->name;
        $county->arms = $request->arms;
        $county->timestamps = false;
        $county->save();

        return redirect()->route('counties.index')->with('success', 'Megye sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $county = County::find($id);
        $county->delete();

        return redirect()->route('counties.index')->with('success', 'Megye sikeresen törölve!');
    }
}
