<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['name'];




    //    public function users(){

    //         return $this->belongsToMany(User::class);
    //     }

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function permission()
    {

        return $this->belongsToMany(Permission::class);
    }
}
