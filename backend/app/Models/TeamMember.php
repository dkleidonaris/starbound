<?php

namespace App\Models;

use App\Models\SeasonTeamMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model
{
    /** @use HasFactory<\Database\Factories\TeamMemberFactory> */
    use HasFactory;

    use HasTranslations;

    public array $translatable = ['first_name', 'last_name', 'role'];

    protected $appends = ['photo_url'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        return asset('assets/members/' . $this->photo) ?? NULL;
    }

    public function assignments()
    {
        return $this->hasMany(TeamMemberAssignment::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_member_assignments')
            ->withPivot(['season_id', 'role', 'order']);
    }
}
