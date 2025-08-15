<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    // Mass-assignable fields (must exist in your `packages` table)
    protected $fillable = [
        'title',
        'country',
        'location',
        'subtitle',
        'description',
        'duration',
        'price',
        'price_unit',
        'status',
        'destination_id',
        'display_order',
        'is_bestseller',
        'is_featured',
        'image_url',
        'rating',
        'total_reviews',
        'tags',
        'inclusions',
        'exclusions',
        'itinerary',
        'gallery_urls',
    ];

    // Type casts
    protected $casts = [
        'is_bestseller' => 'boolean',
        'is_featured'   => 'boolean',
        'tags'          => 'array',     // expects JSON column
        'price'         => 'decimal:2',
        'rating'        => 'float',
        'total_reviews' => 'integer',
        'inclusions'   => 'array',
        'exclusions'   => 'array',
        'itinerary'    => 'array',     // switch to 'string' if you changed to longText
        'gallery_urls' => 'array',
    ];

    # Relationships
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    # Accessors used in Blade
    public function getFormattedPriceAttribute(): string
    {
        return number_format((float) ($this->price ?? 0), 2);
    }

    public function getFormattedRatingAttribute(): string
    {
        return number_format((float) ($this->rating ?? 0), 1);
    }

    // Fallback image if none set (optional)
    public function getImageUrlAttribute($value): string
    {
        return $value ?: 'https://via.placeholder.com/800x600?text=Package';
    }

    // Scope for convenience (optional)
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    
}
