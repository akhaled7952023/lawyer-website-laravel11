<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title' , 'about_us'];
    protected $fillable = ['title' , 'content' , 'about_us' , 'image' , 'number'];

    protected $casts = [
        'content' => 'array',
    ];

}
