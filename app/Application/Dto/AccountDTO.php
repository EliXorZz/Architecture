<?php

namespace App\Application\Dto;

use App\Domain\Enums\Profile;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AccountDTO extends Data
{
    public function __construct(
        public Optional|int $id,
        public Optional|int $user_id,
        public Optional|string $name,
        public Optional|string $currency,
        public Optional|string $iban,
        public Optional|float $balance,
    ) { }
}
