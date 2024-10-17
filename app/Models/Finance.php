<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    // Field yang dapat diisi melalui mass assignment
    protected $fillable = [
        'description',
        'amount',
        'transaction_date',
    ];
}
