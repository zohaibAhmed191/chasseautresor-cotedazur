<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    protected $fillable = [
        'main_heading',
        'main_paragraph',
        'sub_paragraph',
        'images',
        'how_to_play_heading',
        'subheading1',
        'subparagraph1',
        'subheading2',
        'subparagraph2',
        'subheading3',
        'subparagraph3',
        'asking_question',
        'asking_lines',
        'endlines',
    ];

    protected $casts = [
        'images' => 'array',
        'asking_lines' => 'array',
        'endlines' => 'array',
    ];
}