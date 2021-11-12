<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'role'
    ];

    protected static $validRoles = [
        'admin' => 'Admin',
        'teacher' => 'Teacher'
    ];

    public static $ADMIN = 'admin';
    public static $TEACHER = 'teacher';

    public function user()
    {
        return $this->hasMany(Student::class);
    }

    public static function isValidRole($value)
    {
        return array_key_exists($value, self::$validRoles);
    }


}
