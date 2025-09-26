<?php

namespace App\Commands\User;

use App\Application\Dto\UserDTO;

class UpdateUserCommand
{
    public function __construct(
        public int $id,
        public UserDTO $dto
    ) {}
}
