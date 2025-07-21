<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprop extends Model
{
    use HasFactory;
     protected $fillable = ['heading', 'description', 'home_page_heading', 'home_page_description'];
}
