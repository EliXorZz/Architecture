<?php

namespace App\Http\Controllers;

use App\Dto\UserDTO;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        public UserServiceInterface $userSvc
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
        $data = $request->validated();
        return $this->userSvc->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): UserDTO
    {
        return $this->userSvc->get($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id): void
    {
        $data = $request->validated();
        $this->userSvc->update($id, $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        $this->userSvc->delete($id);
    }
}
