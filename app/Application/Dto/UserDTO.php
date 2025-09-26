<?php

namespace App\Application\Dto;

use App\Domain\Enums\Profile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public Optional|int $id,
        public Optional|string $first_name,
        public Optional|string $last_name,
        public Optional|string $email,
        public Optional|string $phone,
        public Optional|Profile $profile
    ) { }
}
