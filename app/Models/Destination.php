<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    // If your table name is "destinations" (default for this model), you can omit this.
    // protected $table = 'destinations';

    // Mass-assignable fields — update to your actual columns
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'country',
        'city',
        'price',
        'image_path',
        'is_active',
    ];

    // Optional: type casts
    protected $casts = [
        'is_active' => 'boolean',
        'price'     => 'decimal:2',
    ];

    // Example relationship (delete if not needed)
    // public function packages()
    // {
    //     return $this->hasMany(Package::class);
    // }
}
