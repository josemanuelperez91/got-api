<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $casts = [
        'seasonsActive' => 'array'
    ];
    protected $hidden = [
        'characterId',
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];  
}
