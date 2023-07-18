<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Scopes\UserActiveScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    protected $guarded = [
        'is_admin',
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
        'password' => 'hashed',
    ];

    protected $append = ['full_name'];

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name . ' ' . $this->last_name,
            set: function ($value) {
                $names = explode(' ', $value);

                return [
                    'first_name' => $names[0] ?? '',
                    'last_name' => $names[1] ?? '',
                ];
            }
        );
    }
    public function username(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Str::slug($value),
        );
    }
    /**
     * Get all of the articles for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new UserActiveScope);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('is_admin', true);
    }
}
