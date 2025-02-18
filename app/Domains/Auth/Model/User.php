<?php

namespace App\Domains\Auth\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    const TYPE_ADMIN = 'admin';
    const TYPE_MEMBER = 'member';
    protected $fillable=
    [
        'name',
        'email',
        'password',
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
