<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'artists' => 'json'
    ];

    protected $fillable = [
        'name',
        'url'
    ];
}
