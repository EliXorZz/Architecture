<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Dto\UserDTO;
use App\Application\Services\CommandBus;
use App\Commands\User\CreateUserCommand;
use App\Commands\User\DeleteUserCommand;
use App\Commands\User\UpdateUserCommand;
use App\Interfaces\UserServiceInterface;
use App\Presentation\Http\Requests\StoreUserRequest;
use App\Presentation\Http\Requests\UpdateUserRequest;
use App\Queries\User\GetUserQuery;

class UserController extends Controller
{
    public function __construct(
        private CommandBus $bus
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): UserDTO
    {
        $dto = $request->dto();
        return $this->bus->dispatch(new CreateUserCommand($dto));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserDTO
    {
        return $this->bus->dispatch(new GetUserQuery($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id): void
    {
        $dto = $request->dto();
        $this->bus->dispatch(new UpdateUserCommand($id, $dto));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        $this->bus->dispatch(new DeleteUserCommand($id));
    }
}
