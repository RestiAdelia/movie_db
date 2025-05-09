<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'category_name', 'description'];
    public $incrementing = false; // disable auto-incrementing to allow manual id update

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
