<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'featured_image',
    ];

    public $translatable = [
        'name',
        'slug',
        'description',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($category) {
            foreach ($category->getTranslations('name') as $locale => $value) {
                $slug = Str::limit(Str::slug($value), 120, '');

                $index = 0;

                while (Category::where("slug->{$locale}", $slug)->exists()) {
                    $index++;
                }

                if ($index > 0) {
                    $slug .= '-' . $index;
                }

                $category->setTranslation('slug', $locale, $slug);
            }
        });
    }
}
