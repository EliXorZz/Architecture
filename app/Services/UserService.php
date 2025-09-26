<?php

namespace App\Services;

use App\Dto\UserDTO;
use App\Enums\Profile;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Str;

class UserService implements UserServiceInterface
{
    public function __construct(
        public UserRepositoryInterface $userRepository
    ) {}

    public function create(array $data): UserDTO
    {
        $user = $this->userRepository->create($data);

        return new UserDTO(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $this->getProfileByEmail($user->email)
        );
    }

    public function get(int $id): UserDTO
    {
        $user = $this->userRepository->find($id);

        return new UserDTO(
            $user->id,
            $user->first_name,
            $user->last_name,
            $user->email,
            $user->phone,
            $this->getProfileByEmail($user->email)
        );
    }

    public function update(int $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id): void
    {
        $this->userRepository->delete($id);
    }

    private function getProfileByEmail(string $email): Profile
    {
        $profile = Profile::STANDARD;

        $domain = Str::after($email, '@');
        if ($domain == 'compagny.com') {
            $profile = Profile::ADMIN;
        }

        return $profile;
    }
}
