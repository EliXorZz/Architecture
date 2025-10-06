<?php

namespace App\Commands\Account;

use App\Application\Dto\AccountDTO;

class CreateAccountCommand
{
    public function __construct(
        public AccountDTO $dto
    ) {}
}
