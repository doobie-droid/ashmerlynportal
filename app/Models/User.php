<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'middlename',
        'surname',
        'email',
        'password',
        'status',
        'gender',
        'avatar',
        'date_of_birth',
        'phone_number'
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
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function getAvatarAttribute($value){
            return asset('storage/'.$value);

    }

    public function userIs($gender){
        if(Str::lower($this->gender) == Str::lower($gender)){
            return true;
        }
    }

    public function userHasRole($rolename)
    {
        //go to the main admin file to impleme

        foreach ($this->roles as $role) {
            if (Str::lower($rolename) == Str::lower($role->name)) {
                return true;
            }
        }
        return false;


    }
}
