<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supporter extends Model
{
    /** @use HasFactory<\Database\Factories\SupporterFactory> */
    use HasFactory;

    use HasTranslations;

    protected $appends = ['logo_url'];
    protected $hidden = ['logo'];

    public array $translatable = ['name'];

    public function supporterType(): BelongsTo
    {
        return $this->belongsTo(SupporterType::class);
    }

    public function getLogoUrlAttribute(): ?string
    {
        return asset('assets/' . $this->logo) ?? NULL;
    }
}
