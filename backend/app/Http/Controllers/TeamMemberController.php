<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;
use App\Http\Resources\TeamMemberResource;
use App\Models\Option;
use App\Models\Season;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $season = request()->query('season')
            ?? Option::where('key', 'current_season')->first()->value;

        $seasonId = Season::where('name', $season)->value('id');

        $members = TeamMember::with(['assignments' => function ($q) use ($seasonId) {
            $q->where('season_id', $seasonId)->with('team');
        }])
            ->whereHas('assignments', function ($q) use ($seasonId) {
                $q->where('season_id', $seasonId);
            })
            ->get();

        return TeamMemberResource::collection($members);
    }

    public function count()
    {
        $seasonName = request()->query('season')
            ?? Option::where('key', 'current_season')->value('value');

        $seasonId = Season::where('name', $seasonName)->value('id');

        if (!$seasonId) {
            return response()->json([
                'count' => 0,
            ]);
        }

        $count = TeamMember::whereHas('assignments', function ($query) use ($seasonId) {
            $query->where('season_id', $seasonId)
                ->whereHas('team', function ($teamQuery) {
                    $teamQuery->where('slug', '!=', 'professors');
                });
        })->count();

        return response()->json([
            'count' => $count,
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
    public function store(StoreTeamMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamMember $teamMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamMemberRequest $request, TeamMember $teamMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        //
    }
}
