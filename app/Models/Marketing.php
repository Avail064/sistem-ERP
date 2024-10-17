<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable) menggunakan mass assignment
    protected $fillable = [
        'title', 'description', 'location', 'price', 'image', 'category'
    ];

}
