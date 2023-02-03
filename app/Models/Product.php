<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'studio',
        'genre',
        'count',
        'ongoing',
        'rating',
        'release',
        'image',
        'description'
        ];

    public function lists()
    {
        return $this->hasMany(Comment::class);
    }
}
