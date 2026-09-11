<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Season extends Model
{
    /** @use HasFactory<\Database\Factories\SeasonFactory> */
    use HasFactory;

    public function members()
    {
        return $this->belongsToMany(TeamMember::class, 'team_member_assignments')
            ->withPivot(['team_id', 'role', 'order']);
    }
}
