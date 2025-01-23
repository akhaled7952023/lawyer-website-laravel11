<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'permissions',
    ];


    protected function permissions(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_null($value) ? [] : json_decode($value, true) ?? [],

            set: fn ($value) => is_array($value) ? json_encode($value) : $value,
        );
    }

    public function getpermessionAttribute($value)
    {
        return json_decode($value);
    }

    public function admins()
    {
        return $this->hasMany(User::class , 'role_id');
    }
}
