<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory, HasSlug;
    protected $fillable = [
        'name',
        'started',
        'ended',
        'description',
        'event_category_id',
        'event_type_id',
        'event_location_id',
        'date',
        'is_featured',
        'is_trending',
        'poster',
        'banner',
    ];

    /**
     * Relationships Models
     */
    public function organizer()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(EventCategory::class);
    }
    public function location()
    {
        return $this->belongsTo(EventLocation::class);
    }
    public function type()
    {
        return $this->belongsTo(EventType::class);
    }

    /**
     * Get the options for generating the slug.
     */
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
