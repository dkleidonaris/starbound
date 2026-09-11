<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'location',
        'description',
    ];

    public array $translatable = ['title', 'location', 'description'];
}
