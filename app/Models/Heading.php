<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heading extends Model
{
    use HasFactory;

     protected $fillable = [
        'home',
        'concours',
        'scenario',
        'faq',
        'blog',
        'aprops',
        'mysteria',
    ];
}
