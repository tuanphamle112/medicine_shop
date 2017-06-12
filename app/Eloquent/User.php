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

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_OTHER = 'other';

    const PATH_AVATAR = 'uploads/avatars/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name',
        'email',
        'phone',
        'address',
        'permission',
        'position',
        'gender',
        'specialize',
        'certificate',
        'experience',
        'workplace',
        'about_you',
        'birthday',
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

    public static function getGenderOption()
    {
        return [
            self::GENDER_MALE => __('Male'),
            self::GENDER_FEMALE => __('Female'),
            self::GENDER_OTHER => __('Other'),
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
