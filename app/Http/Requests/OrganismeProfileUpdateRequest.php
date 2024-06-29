<?php

namespace App\Http\Requests;

use App\Models\Organisme;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganismeProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Organisme::class)->ignore($this->user()->id)],
        ];
    }
}
