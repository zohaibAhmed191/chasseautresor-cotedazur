<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqPage extends Model
{
    use HasFactory;
    protected $fillable = ['heading', 'paragraph', 'contact_form_heading', 'contact_form_paragraph'];
}
