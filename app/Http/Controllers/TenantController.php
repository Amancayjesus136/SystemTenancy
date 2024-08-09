<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenants.module', [
            'tenants' => Tenant::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:tenants',
        ]);

        $tenant = Tenant::create($request->all());

        $tenant->domains()->create([
            'domain' => $request->get('id') . '.' . 'tenancy.test',
        ]);

        return redirect()->back()->with('success', 'Domain created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'id' => 'required|unique:tenants,id,' . $tenant->id,
        ]);

        $tenant->update([
            'id' => $request->get('id'),
        ]);

        $tenant->domains()->update([
            'domain' => $request->get('id') . '.' . 'tenancy.test',
        ]);

        return redirect()->back()->with('success', 'Domain updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->back()->with('success', 'Domain delete successfully');
    }
}
