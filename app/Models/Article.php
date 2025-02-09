<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'slug', 'content', 'meta_description', 'meta_keywords', 'meta_title'];
    protected $fillable = ['title', 'slug', 'content', 'meta_description', 'service_id' , 'meta_keywords', 'meta_title', 'image', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function getFormattedDateAttribute()
{
    return $this->created_at->format('d-m-Y');
}

}
