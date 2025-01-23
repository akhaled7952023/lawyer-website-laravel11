<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    use HasTranslations;


    public $translatable = ['adress' , 'about'];
    protected $fillable = [
        'main_email','secondary_email','logo','phone_mobile' , 'landline_phone' , 'adress' , 'map' ,
        'about' , 'social_links'

    ];
    protected $casts = [
        'social_links' => 'array',
    ];

    // public function getSocialLinksAttribute($value)
    // {
    //     return json_decode($value, true) ?? [];
    // }

    // public function setSocialLinksAttribute($value)
    // {
    //     $this->attributes['social_links'] = json_encode($value);
    // }


}
