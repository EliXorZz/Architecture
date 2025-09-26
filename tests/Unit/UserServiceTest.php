<?php

use App\Application\Dto\UserDto;
use App\Application\Services\UserService;
use App\Interfaces\UserRepositoryInterface;

beforeEach(function () {
    $this->repository = Mockery::mock(UserRepositoryInterface::class);
    $this->service = new UserService($this->repository);
});

it('can create a user and return a UserDTO', function () {
    $userData = [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'phone' => '1234567890',
    ];

    $userModel = new \App\Persistence\Models\User($userData);
    $userModel->id = 1;

    $userEntity = new \App\Domain\Entities\UserEntity(
        $userModel->id,
        $userModel->first_name,
        $userModel->last_name,
        $userModel->email,
        $userModel->phone,
    );

    $this->repository
        ->shouldReceive('create')
        ->once()
        ->with($userData)
        ->andReturn($userEntity);

    $dto = $this->service->create($userData);

    expect($dto)->toBeInstanceOf(UserDTO::class)
        ->and($dto->id)->toBe(1)
        ->and($dto->email)->toBe('john@example.com');
});

it('can get a user by id and return a UserDTO', function () {
    $userModel = new \App\Persistence\Models\User([
        'first_name' => 'Alice',
        'last_name' => 'Smith',
        'email' => 'alice@example.com',
        'phone' => '9876543210',
    ]);

    $userModel->id = 2;

    $userEntity = new \App\Domain\Entities\UserEntity(
        $userModel->id,
        $userModel->first_name,
        $userModel->last_name,
        $userModel->email,
        $userModel->phone,
    );

    $this->repository
        ->shouldReceive('find')
        ->once()
        ->with(2)
        ->andReturn($userEntity);

    $dto = $this->service->get(2);

    expect($dto)->toBeInstanceOf(UserDTO::class)
        ->and($dto->id)->toBe(2)
        ->and($dto->first_name)->toBe('Alice');
});

it('can update a user', function () {
    $this->repository
        ->shouldReceive('update')
        ->once()
        ->with(3, ['email' => 'new@example.com'])
        ->andReturn(true);

    $result = $this->service->update(3, ['email' => 'new@example.com']);

    expect($result)->toBeTrue();
});

it('can delete a user', function () {
    $this->repository
        ->shouldReceive('delete')
        ->once()
        ->with(4)
        ->andReturnNull();

    $this->service->delete(4);

    expect(true)->toBeTrue();
});
