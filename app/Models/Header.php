<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Header extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['firstsolgan', 'secondsolgan', 'textbutton'];
    protected $fillable = ['image', 'firstsolgan', 'secondsolgan', 'textbutton', 'link', 'features'];

    protected $casts = [
        'features' => 'array',
    ];

    // public function getFeaturesAttribute($value)
    // {
    //     return json_decode($value, true) ?? [];
    // }

    // public function setFeaturesAttribute($value)
    // {
    //     $this->attributes['features'] = json_encode($value);
    // }

}
