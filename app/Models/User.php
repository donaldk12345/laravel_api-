<?php

namespace App\Models;

use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'

    ];


    // public function roles(){
    //     return $this->belongsTo(Role::class);
    // }

    /**
     * The roles that belong to the user.
     */
    public function role()
    {

        return $this->belongsTo(Role::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {

        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }
}
