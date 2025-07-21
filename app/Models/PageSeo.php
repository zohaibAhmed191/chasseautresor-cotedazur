<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    use HasFactory;

    
    protected $table = 'pages_seos'; 


    protected $fillable = [
        'home_meta_title',
        'home_meta_description',
        'home_meta_keywords',
        'faq_meta_title',
        'faq_meta_description',
        'faq_meta_keywords',
        'concour_meta_title',
        'concour_meta_description',
        'concour_meta_keywords',
        'mysteria_meta_title',
        'mysteria_meta_description',
        'mysteria_meta_keywords',
        'aprops_meta_title',
        'aprops_meta_description',
        'aprops_meta_keywords',
    ];

}