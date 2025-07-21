<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterText extends Model
{
    use HasFactory;

      protected $fillable = [
        'home',
        'aprops',
        'scenario',
        'blogs',
        'faqs',
        'concours',
        'mysteria',
    ];
}
