<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'slug', 'position', 'experience' , 'bio' , 'meta_description', 'meta_keywords', 'meta_title'];
    protected $fillable = [
        'name', 'slug', 'position', 'experience' , 'bio' , 'meta_description', 'meta_keywords', 'meta_title',
        'status' , 'image' , 'years'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


}
