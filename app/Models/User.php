<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'image',
        'bio',
        'email',
        'password',
        'phone_number',
        'country',
        'current_location',
        'roleID',
        'is_blocked',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_blocked' => 'boolean',
    ];




    public function role()
    {
        return $this->belongsTo(Role::class, 'roleID');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function favoritePosts()
    {
        return $this->hasMany(FavoritePost::class);
    }

    public function userSemesters()
    {
        return $this->hasMany(UserSemester::class);
    }

    public function userSubjects()
    {
        return $this->hasMany(UserSubject::class);
    }
    public function posts()
    {
        return $this->morphMany(Post::class, 'location');
    }

}

