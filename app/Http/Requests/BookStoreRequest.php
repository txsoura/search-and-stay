<?php

namespace App\Http\Requests;

use App\Enums\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'isbn' => 'required|numeric|digits:13|unique:books,isbn',
            'value' => 'required|numeric|min:0',
            'currency' => ['sometimes', 'required', 'string', Rule::in(Currency::toArray())],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name' => ucwords($this->name),
        ]);
    }
}
