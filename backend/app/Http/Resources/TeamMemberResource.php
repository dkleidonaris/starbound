<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'department_id' => $this->department_id,

            'first_name' => $this->getTranslations('first_name'),
            'last_name' => $this->getTranslations('last_name'),

            'email' => $this->email,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'photo' => $this->photo,
            'photo_url' => $this->photo_url,

            'assignments' => $this->assignments->map(function ($a) {
                return [
                    'team_id' => $a->team_id,
                    'season_id' => $a->season_id,
                    'role' => $a->getTranslations('role'),
                    'order' => $a->order,
                ];
            }),
        ];
    }
}
