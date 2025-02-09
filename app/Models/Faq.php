<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'question' , 'answer'];
    protected $fillable = ['title', 'question' , 'answer' , 'image' , 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
