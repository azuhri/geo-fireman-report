<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Http\Controllers\FiremanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = \false;
    public $keyType = "string";
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = \faker()->uuid();
        });
    }

    public function avatar()
    {
        if($this->isFireman()) {
            return asset('icons/fireman.png');
        }
        return $this->gender == "pria" ? asset('icons/male.png') : asset('icons/female.png');
    }

    public function isUser()
    {
        return $this->type_user == 1;
    }

    public function isFireman()
    {
        return $this->type_user == 0;
    }

    public function checkPassword(string $password)
    {
        return Hash::check($password, $this->password);
    }

    public function isNullLatLong()
    {
        return Auth::user()->latitude == \null && Auth::user()->longitude == \null;
    }

    public function isMale()
    {
        return $this->gender == "pria";
    }

    public static function getFiremansFree()
    {
        $listOpenReport = Report::where("user_id",Auth::user()->id)
                              ->where("report_status","=","pending")
                              ->orWhere("report_status","=","diproses")
                              ->pluck("fireman_id");
        return User::whereNotIn("id", $listOpenReport)
                    ->where("type_user", 0)            
                    ->orderBy("name","ASC")
                    ->get();
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
}
