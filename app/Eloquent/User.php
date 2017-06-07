<?php

namespace App\Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const PERMISSION_USER = 0;
    const PERMISSION_ADMIN = 1;

    const PATH_AVATAR = 'uploads/avatars/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name',
        'email',
        'password',
        'phone',
        'address',
        'permission',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function getPermissionOption()
    {
        return [
            self::PERMISSION_USER => __('Normal User'),
            self::PERMISSION_ADMIN => __('Admin'),
        ];
    }

    public function getAllComments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getAllMarkMedicines()
    {
        return $this->hasMany(MarkMedicine::class);
    }
    public function getAllPrescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
