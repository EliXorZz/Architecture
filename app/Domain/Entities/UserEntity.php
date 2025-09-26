<?php


namespace App\Domain\Entities;

use App\Domain\Enums\Profile;
use Illuminate\Support\Str;

class UserEntity
{
    public function __construct(
        public int $id,
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $phone,
    ) {}

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
