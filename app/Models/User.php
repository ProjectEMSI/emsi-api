<?php

namespace App\Models;

use App\Concerns\HasProfilePhoto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasProfilePhoto, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

//    public function getFormattedMoneyAttribute(): string
//    {
//        return money($this->money);
//    }
//
//    public function getLevelPercentageAttribute(): float|int
//    {
//        $previousLevel = LevelService::pointsByLevel($this->level - 1);
//        $currentLevel = LevelService::pointsByLevel($this->level);
//
//        if ($this->level === 0) {
//            $previousLevel = 0;
//        }
//
//        return (($this->reputation - $previousLevel) / ($currentLevel - $previousLevel)) * 100;
//    }
}
