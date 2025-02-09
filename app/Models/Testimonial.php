<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'job' , 'feedback'];
    protected $fillable = ['name', 'job' , 'feedback' , 'image' , 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


}
