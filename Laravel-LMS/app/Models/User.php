<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status', // active | blocked
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ======================
       Relationships
    ======================= */

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    /* ======================
       Status Helper
    ======================= */

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
