<?php

namespace App\Queries\Account;

class ListAccountWithUserQuery
{
    public function __construct(
        public int $userId
    ) {}
}
