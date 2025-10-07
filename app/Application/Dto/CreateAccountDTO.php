<?php

namespace App\Application\Dto;

use App\Domain\Enums\Profile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CreateAccountDTO extends Data
{
    public function __construct(
        public UserDTO $user,
        public AccountDTO $account,
    ) { }
}
