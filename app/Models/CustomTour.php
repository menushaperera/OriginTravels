<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTour extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'country',
        'city',
        'flights',
        'departure_city',
        'departure_date',
        'return_date',
        'flexible_dates',
        'adults',
        'children',
        'infants',
        'rooms',
        'hotel_category',
        'budget',
        'full_name',
        'phone',
        'email',
        'travel_agency',
        'special_requests',
        'status'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'return_date' => 'date',
        'flexible_dates' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope for pending requests
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    // Scope for processed requests
    public function scopeProcessed($query)
    {
        return $query->where('status', 'processed');
    }
}