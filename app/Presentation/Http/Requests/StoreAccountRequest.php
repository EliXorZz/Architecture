<?php

namespace App\Presentation\Http\Requests;

use App\Application\Dto\CreateAccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user.first_name' => ['required', 'string', 'max:255'],
            'user.last_name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'email', 'max:255'],
            'user.phone' => ['required', 'string', 'max:20'],
            'account.name' => ['required', 'string', 'max:255'],
            'account.currency' => ['required', 'string', 'max:10'],
            'account.iban' => ['required', 'string', 'max:255'],
            'account.balance' => ['required', 'numeric'],
        ];
    }

    public function dto(): CreateAccountDTO
    {
        return CreateAccountDTO::from($this->validated());
    }
}
