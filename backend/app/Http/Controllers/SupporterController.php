<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupporterRequest;
use App\Http\Requests\UpdateSupporterRequest;
use App\Models\Supporter;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Supporter::all()
        ]);
    }

    public function count()
    {
        return response()->json([
            'count' => Supporter::count()
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
    public function store(StoreSupporterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Supporter $supporter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supporter $supporter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupporterRequest $request, Supporter $supporter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supporter $supporter)
    {
        //
    }
}
