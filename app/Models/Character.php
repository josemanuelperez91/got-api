<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $casts = [
        'parents' => 'array',
        'siblings' => 'array',
        'killedBy' => 'array',
        'killed' => 'array',
        'servedBy' => 'array',
        'parentOf' => 'array',
        'marriedEngaged' => 'array',
        'serves' => 'array',
        'guardedBy' => 'array',
        'guardianOf' => 'array',
        'allies' => 'array',
        'abductedBy' => 'array',
        'abducted' => 'array',
        'sibling' => 'array',
        'royal' => 'boolean',
        'kingsguard' => 'boolean'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $appends = ['actors'];

    protected $guarded = [];  

    public function getActorsAttribute()
     {
        return $this->actors()->get();
     }
    
    public function Actors()
    {
        return $this->hasMany(Actor::class, 'characterId');
    }
}
