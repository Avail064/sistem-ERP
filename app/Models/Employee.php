<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Tentukan field yang dapat diisi secara massal
    protected $fillable = ['name', 'position', 'salary', 'start_date'];
}
