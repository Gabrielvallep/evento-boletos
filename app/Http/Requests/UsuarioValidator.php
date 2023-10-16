<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Validator;
class UsuarioValidator extends Validator

{
    public function validate(array $data)
    {
        $validator = Validator::make($data, $this->rules(), $this->messages());

        return $validator->validate();
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dui' => ['required', 'string', 'unique:usuarios', 'min:10', 'max:10'],
            'telefono' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo válida.',
            'email.max' => 'El campo email no debe superar los 255 caracteres.',
            'email.unique' => 'El email ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'dui.required' => 'El campo DUI es obligatorio.',
            'dui.unique' => 'El dui ya está en uso.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
        ];
    }
}
