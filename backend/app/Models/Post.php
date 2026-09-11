<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
    ];

    public $translatable = [
        'title',
        'content',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function getFeaturedImageUrlAttribute(): string|null
    {
        return $this->featured_image ? asset($this->featured_image) : null;
    }

    protected static function booted(): void
    {
        static::creating(function ($post) {

            $slug = Str::limit(Str::slug($post->getTranslation('title', 'en')), 120, '');

            $index = 0;

            while (Post::where("slug", $slug)->exists()) {
                $index++;
            }

            if ($index > 0) {
                $slug .= '-' . $index;
            }

            $post->slug = $slug;
        });
    }
}
