<?php

namespace App\Persistence\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domain\Enums\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

    public function getProfile(): Profile
    {
        $profile = Profile::STANDARD;

        $domain = Str::after($this->email, '@');
        if ($domain == 'compagny.com') {
            $profile = Profile::ADMIN;
        }

        return $profile;
    }
}
