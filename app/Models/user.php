<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_role',
        'id_employe',
        'date_debut_session',
        'date_fin_session',
        'id_user_updateure',
        'id_user_createure',
    ];
    protected $dates = [
        'date_debut_session',
        'date_fin_session',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role (){
        return $this->belongTo(role::class,'id_role');
    }
    public function employe (){
        return $this->belongTo(employe::class,'id_employe');
    }
    public function userCreateur()
    {
        return $this->belongsTo(User::class, 'id_user_createure');
    }

    public function userUpdateur()
    {
        return $this->belongsTo(User::class, 'id_user_updateure');
    }
}
