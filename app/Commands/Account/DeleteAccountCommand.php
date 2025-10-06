<?php

namespace App\Commands\Account;

class DeleteAccountCommand
{
    public function __construct(
       public int $id
    ) {}
}
