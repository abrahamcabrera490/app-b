<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'assigned_roles');
    }
    public function hasRoles( array $roles)
    {




        foreach($roles as $role)
        {
            foreach($this->roles as $userRole)
            {
                if( $userRole->name === $role)
                {
                    return true;
                }
            }
            
        }
        return false;
    }


public function setPasswordAttribute($password)

{
    $this->attributes['password'] = bcrypt($password);
}

}
