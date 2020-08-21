<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPasswordNotification;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
        'name', 'email', 'password', 'role', 'cpf'
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

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $value);
    }

    public function getCpfFormattedAttribute()
    {
        $string = $this->cpf;

        if (!empty($string)) {
            $string = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $string);
        }

        return $string;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->email,
            'email' => $this->name
        ];
    }
}
