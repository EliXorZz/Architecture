<?php

namespace App\Application\Dto;

use App\Domain\Enums\Profile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserWithAccountsDTO extends Data
{
    public function __construct(
        public Optional|string $first_name,
        public Optional|string $last_name,

        /** @var AccountDTO[] */
        public Optional|array $accounts,
    ) { }
}
