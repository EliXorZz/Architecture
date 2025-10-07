<?php

namespace App\Presentation\Http\Controllers;

use App\Application\Dto\AccountDTO;
use App\Application\Services\CommandBus;
use App\Commands\Account\CreateAccountWithUserCommand;
use App\Commands\Account\DeleteAccountCommand;
use App\Commands\Account\UpdateAccountCommand;
use App\Presentation\Http\Requests\StoreAccountRequest;
use App\Presentation\Http\Requests\UpdateAccountRequest;
use App\Queries\Account\GetAccountQuery;

class AccountController extends Controller
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
    public function store(StoreAccountRequest $request): void
    {
        $dto = $request->dto();
        $this->bus->dispatch(new CreateAccountWithUserCommand($dto));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): AccountDTO
    {
        return $this->bus->dispatch(new GetAccountQuery($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, string $id): void
    {
        $dto = $request->dto();
        $this->bus->dispatch(new UpdateAccountCommand($id, $dto));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): void
    {
        $this->bus->dispatch(new DeleteAccountCommand($id));
    }
}
