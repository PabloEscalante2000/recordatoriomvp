<?php

namespace App\Http\Requests\v1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PatchCliente extends FormRequest
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
            "data.attributes.nombre" => ["sometimes", "string", "max:255"],
            "data.attributes.email" => ["sometimes", "email", "max:255"],
            "data.attributes.telefono" => ["sometimes", "string", "max:20"],
        ];
    }

    public function validatedData()
    {
        $data = [];
        if($this->has("data.attributes.nombre")) {
            $data["nombre"] = $this->input("data.attributes.nombre");
        }
        if($this->has("data.attributes.email")) {
            $data["email"] = $this->input("data.attributes.email");
        }
        if($this->has("data.attributes.telefono")) {
            $data["telefono"] = $this->input("data.attributes.telefono");
        }
        return $data;
    }
}
