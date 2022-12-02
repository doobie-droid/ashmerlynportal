<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

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

    function substrwords($text, $maxchar, $end='...')
    {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i = 0;
            while (1) {
                $length = strlen($output) + strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $text;
        }
        return $output;
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getAvatarAttribute($value)
    {
        if ($value == null){
            return 'https://eu.ui-avatars.com/api/?name='.$this->surname.'+'.$this->firstname.'&size=300';
        }else {
            return asset('storage/' . $value);
        }

    }
    public function getDateOfBirthAttribute($value)
    {
        if ($value == null){
            return 'Not filled yet';
        }else {
            return $value;
        }

    }

    public function userIs($gender)
    {
        if (Str::lower($this->gender) == Str::lower($gender)) {
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

    public function getName($id)
    {
        if ($id == null) {
            return 'null';
        }
        $user = User::find($id);
        return $user->surname . ' ' . $user->firstname;
    }

    public function getSubjectName($id){
        if ($id == null) {
            return 'null';
        }
        $subject = Subject::find($id);

       return $this->substrwords($subject->name,12);
    }

    public function getYearName($id){
        if($id == null){
            return 'null';
        }
        $year = Year::find($id);
        return Str::ucfirst($year->slug);
    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function singleSubjectScore($subject_id){
        $details = Detail::find(1);
        return $this->hasOne(Score::class)
            ->where('subject_id',$subject_id)
            ->where('exam',$details->exam)
            ->where('term',$details->term)
            ->where('entry_year',$details->entry_year);
    }

}
