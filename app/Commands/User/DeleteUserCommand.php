<?php

namespace App\Commands\User;

class DeleteUserCommand
{
    public function __construct(
       public int $id
    ) {}
}
