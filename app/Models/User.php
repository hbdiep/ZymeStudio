<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_EDITOR = 0;
    const ROLE_ADMIN = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role' // 0: Editor, 1: admin
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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

    /**
     * Relationshop
     * thuc hien lien ket bang du lieu, lay danh sach du lieu con kem theo
     * co the truy van trong bang du lieu
     */
    /**
     * lien ket 1-n
     * 
     * su dung haseOne: khoa phu, khoa chinh
     */
    public function files()
    {
        return $this->hasMany('App\Models\File', 'user_id', 'id');
    }
    public function salary()
    {
        return $this->hasMany('App\Models\Salary', 'user_id', 'id');
    }
}