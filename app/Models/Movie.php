<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;
    protected $fillable = [
        'title', 'category_id', 'slug', 'cover_image', 'trailer',
        'year', 'actors', 'synopsis'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
