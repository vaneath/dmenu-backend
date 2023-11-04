<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Model
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
