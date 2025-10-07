<?php

namespace App\Domain\Entities;

class AccountEntity
{
    public function __construct(
        public int $id,
        public ?int $userId,
        public string $name,
        public string $currency,
        public string $iban,
        public float $balance,
    ) {}
}
