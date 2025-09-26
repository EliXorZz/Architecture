<?php

namespace App\Dto;

use App\Enums\Profile;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(
        public int $id,
        public string $first_name,
        public string $last_name,
        public string $email,
        public string $phone,
        public Profile $profile
    ) { }
}
