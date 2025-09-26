<?php

namespace App\Queries\User;

class GetUserQuery
{
    public function __construct(
        public int $id,
    ) {}
}
