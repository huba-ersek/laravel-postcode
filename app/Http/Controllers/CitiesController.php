<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = request()->input('name');
        $countyId = request()->input('county-id');
        $counties = County::all();
        $cities = City::query()
            ->when($name, function (Builder $query, string $name) {
                $query->where('city', 'LIKE', '%' . $name . '%');
            })
            ->when($countyId, function (Builder $query, string $id) {
                $query->where('county_id', '=', $id);
            })
            ->paginate(20);
        return view('cities.index', compact('cities', 'counties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "city" => "required|string",
            "zip_code" => "required",
            "county_id" => "required",
            "population" => "required"
        ]);

        $city = new City();
        $city->city = $request->city;
        $city->zip_code = $request->zip_code;
        $city->county_id = $request->county_id;
        $city->population = $request->population;
        $city->timestamps = false;
        $city->save();

        return redirect()->route('cities.index')->with('success', 'Város sikeresen létrehozva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "city" => "required|string",
            "zip_code" => "required",
            "county_id" => "required",
            "population" => "required"
        ]);

        $city = City::find($id);
        $city->city = $request->city;
        $city->zip_code = $request->zip_code;
        $city->county_id = $request->county_id;
        $city->population = $request->population;
        $city->timestamps = false;
        $city->save();

        return redirect()->route('cities.index')->with('success', 'Város sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'Város sikeresen törölve!');
    }
}
