<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;

    const ROLES = [self::ROLE_ADMIN => 'Administrador', self::ROLE_USER => 'Usuário Comum'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPasswordNotification($token));

    }

    public function getCreatedAtOriginalAttribute()
    {
        return $this->created_at;
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->attributes['created_at'] = date('d/m/Y H:i', strtotime($this->created_at));
    }

    public function getUpdatedAtOriginalAttribute()
    {
        return $this->updated_at;
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->attributes['updated_at'] = date('d/m/Y H:i', strtotime($this->updated_at));
    }
}
