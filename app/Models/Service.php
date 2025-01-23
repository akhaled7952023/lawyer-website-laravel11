<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'slug', 'description', 'meta_description', 'meta_keywords', 'meta_title'];
    protected $fillable = ['title', 'slug', 'description', 'meta_description', 'meta_keywords', 'meta_title', 'image', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
