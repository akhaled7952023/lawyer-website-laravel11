<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Skill extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    protected $fillable = ['title', 'image', 'skills', 'counters'];

    protected $casts = [
        'skills' => 'array',
        'counters' => 'array'

    ];

    // public function getSkillsAttribute($value)
    // {
    //     return json_decode($value, true) ?? [];
    // }

    // public function setSkillsAttribute($value)
    // {
    //     $this->attributes['skills'] = json_encode($value);
    // }
    // public function getCountersAttribute($value)
    // {
    //     return json_decode($value, true) ?? [];
    // }

    // public function setCountersAttribute($value)
    // {
    //     $this->attributes['counters'] = json_encode($value);
    // }



}
