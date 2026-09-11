<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasTranslations;

    public function members()
    {
        return $this->belongsToMany(TeamMember::class, 'team_member_assignments')
            ->withPivot(['season_id', 'role', 'order']);
    }

    public array $translatable = ['name'];
}
