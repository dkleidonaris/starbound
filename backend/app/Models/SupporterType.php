<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupporterType extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];

    public function supporters(): HasMany
    {
        return $this->hasMany(Supporter::class);
    }
}
