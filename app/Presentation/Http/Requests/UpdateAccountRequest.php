<?php

namespace App\Presentation\Http\Requests;

use App\Application\Dto\AccountDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'user.first_name' => ['nullable', 'string', 'max:255'],
            'user.last_name' => ['nullable', 'string', 'max:255'],
            'user.email' => ['nullable', 'email', 'max:255'],
            'user.phone' => ['nullable', 'string', 'max:20'],
            'name' => ['nullable', 'string', 'max:255'],
            'currency' => ['nullable', 'string', 'max:10'],
            'iban' => ['nullable', 'string', 'max:255'],
            'balance' => ['nullable', 'numeric'],
        ];
    }

    public function dto(): AccountDTO
    {
        return AccountDTO::from($this->validated());
    }
}
