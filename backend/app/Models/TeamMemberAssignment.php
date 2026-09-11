<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TeamMemberAssignment extends Model
{
    /** @use HasFactory<\Database\Factories\TeamMemberAssignmentFactory> */
    use HasFactory;

    use HasTranslations;

    public array $translatable = ['role'];

    protected $fillable = [
        'team_id',
        'team_member_id',
        'season_id',
        'role',
        'order',
    ];

    public function member()
    {
        return $this->belongsTo(TeamMember::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
