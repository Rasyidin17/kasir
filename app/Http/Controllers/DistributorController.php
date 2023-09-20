<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $distributors = Distributor::latest()->paginate(5);
        return view('distributors.index', compact('distributors'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('distributors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'n_dist' => 'required',
            'n_rek' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);
        Distributor::create($request->all());
        return redirect()->route('distributors.index')
        ->with('success', 'Distributor Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'n_dist' => 'required',
            'n_rek' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
        ]);
        $distributor->update($request->all());
        return redirect()->route('distributors.index')
        ->with('success', 'Distributor Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributors.index')
        ->with('success', 'Distributor deleted successfully.');
    }
}
