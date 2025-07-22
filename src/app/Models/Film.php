<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
        'release_year',
        'director',
        'poster',
    ];

    // Relasi: 1 film bisa punya banyak review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Rata-rata rating untuk film ini
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
