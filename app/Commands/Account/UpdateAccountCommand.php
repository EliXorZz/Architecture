<?php

namespace App\Commands\Account;

use App\Application\Dto\AccountDTO;

class UpdateAccountCommand
{
    public function __construct(
        public int $id,
        public AccountDTO $dto
    ) {}
}
