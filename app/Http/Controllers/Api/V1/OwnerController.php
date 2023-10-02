<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Owner\StoreOwnerRequest;
use App\Http\Requests\Owner\UpdateOwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $owners = Owner::all();
        return OwnerResource::collection($owners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOwnerRequest $request
     * @return OwnerResource
     */
    public function store(StoreOwnerRequest $request)
    {
        $validated = $request->validated();
        $owner = Owner::create($validated);
        return OwnerResource::make($owner);
    }

    /**
     * Display the specified resource.
     *
     * @param Owner $owner
     * @return OwnerResource
     */
    public function show(Owner $owner)
    {
        if (!$owner) {
            return response()->json(['message' => 'Owner not found'], Response::HTTP_NOT_FOUND);
        }

        return OwnerResource::make($owner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOwnerRequest $request
     * @param Owner $owner
     * @return OwnerResource
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        if (!$owner) {
            return response()->json(['message' => 'Owner not found'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validated();
        $owner->update($validated);
        return OwnerResource::make($owner);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        if (!$owner) {
            return response()->json(['message' => 'Owner not found'], Response::HTTP_NOT_FOUND);
        }

        $owner->delete();
        return response()->json(['message' => 'Owner deleted successfully'], Response::HTTP_OK);
    }
}
