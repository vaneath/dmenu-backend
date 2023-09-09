<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\StoreOwnerRequest;
use App\Http\Requests\Owner\UpdateOwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Owners";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        $validated = $request->validated();

        $owner = Owner::create($validated);

        return OwnerResource::make($owner);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
