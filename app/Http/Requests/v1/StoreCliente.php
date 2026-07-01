<?php

namespace App\Http\Requests\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCliente extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "data.attributes.nombre" => ["required", "string", "max:255"],
            "data.attributes.email" => ["required", "string", "email", "max:255", "unique:clientes,email"],
            "data.attributes.telefono" => ["required", "string", "max:20"],
        ];
    }

    public function validatedData(): array
    {
        return [
            "nombre" => $this->input("data.attributes.nombre"),
            "email" => $this->input("data.attributes.email"),
            "telefono" => $this->input("data.attributes.telefono"),
        ];
    }
}
