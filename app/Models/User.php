<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Jobs\SendLoginOtpJob;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'mobile_verified_at' => 'datetime',
        'otp_expired_at' => 'datetime',
    ];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($user) {

            if (is_null($user->role_id)) {

                $defaultRole = Role::default();

                $user->role_id = $defaultRole->id;
            }
        });
    }


    public function createLoginToken($name = 'app')
    {
        $token = $this->createToken($name);

        $token->accessToken->host = request()->header('User-Agent');
        $token->accessToken->ip_address = request()->ip();

        $token->accessToken->update();

        return $token;
    }

    /**
     * Hash OTP
     *
     * @param mixed $value
     * @return void
     */
    public function setOtpAttribute($value)
    {

        $this->attributes['otp'] = Hash::make($value);
    }

    public function resetOtp()
    {
        $this->otp = null;
        $this->otp_expired_at = null;
        $this->updateQuietly();
        return $this;
    }

    public function resetLoginAttempts()
    {
        $this->login_attempts = 0;
        $this->updateQuietly();
        return $this;
    }

    public function verifyMobile()
    {
        $this->mobile_verified_at = now();
        $this->updateQuietly();

        return $this;
    }
}
