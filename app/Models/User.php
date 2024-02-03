<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const BANNED = true;
    const NOT_BANNED = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'staff_id',
        'w_phone',
        'm_phone',
        'role_id',
        'banned',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    static function getBanned()
    {
        return [
            self::BANNED => 'Yes',
            self::NOT_BANNED => 'No',
        ];
    }

    public function getBannedTitleAttribute()
    {
        if ($this->banned === NULL) {
            return 'None';
        }
        return self::getBanned()[$this->banned];
    }
}
