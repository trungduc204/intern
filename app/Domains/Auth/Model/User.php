<?php

namespace App\Domains\Auth\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use HasFactory;
    const TYPE_ADMIN = 'admin';
    const TYPE_MEMBER = 'member';
    protected $fillable=
    [
        'name',
        'email',
        'password',
        'type'
    ];

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

    public function isAdmin() {
        return $this->type == self::TYPE_ADMIN;
    }
    public function isMember() {
        return $this->type == self::TYPE_MEMBER;












        
    }
}
