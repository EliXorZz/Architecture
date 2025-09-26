<?php

namespace App\Commands\User;

use App\Application\Dto\UserDTO;

class CreateUserCommand
{
    public function __construct(
        public UserDTO $dto
    ) {}
}
