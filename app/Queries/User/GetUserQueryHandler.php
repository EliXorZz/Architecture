<?php

namespace App\Queries\User;

use App\Application\Dto\UserDTO;
use App\Interfaces\UserRepositoryInterface;

class GetUserQueryHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function handle(GetUserQuery $query): UserDTO
    {
        $user = $this->userRepository->find($query->id);

        return new UserDTO(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $user->getProfile()
        );
    }
}
