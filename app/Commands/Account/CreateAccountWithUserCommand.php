<?php

namespace App\Commands\Account;

use App\Application\Dto\CreateAccountDTO;

class CreateAccountWithUserCommand
{
    public function __construct(
        public CreateAccountDTO $dto
    ) {}
}
