<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupporterTypeRequest;
use App\Http\Requests\UpdateSupporterTypeRequest;
use App\Models\SupporterType;

class SupporterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => SupporterType::all()
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
    public function store(StoreSupporterTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SupporterType $supporterType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupporterType $supporterType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupporterTypeRequest $request, SupporterType $supporterType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupporterType $supporterType)
    {
        //
    }
}
