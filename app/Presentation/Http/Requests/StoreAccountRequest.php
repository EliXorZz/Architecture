<?php

namespace App\Presentation\Http\Requests;

use App\Application\Dto\AccountDTO;
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
            'user_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'max:10'],
            'iban' => ['required', 'string', 'max:255'],
            'balance' => ['required', 'numeric'],
        ];
    }

    public function dto(): AccountDTO
    {
        return AccountDTO::from($this->validated());
    }
}
