<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
        'password' => 'hashed',
        'password_confirmation' => 'hashed',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'profile_img_path',
        'email',
        'password',
        'password_confirmation',
        'phone_number',
    ];

    protected $hidden = [
        'password',
    ];

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }
}
