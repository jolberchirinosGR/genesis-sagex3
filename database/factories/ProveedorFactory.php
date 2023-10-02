<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proveedor;
use Illuminate\Support\Str;

class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idempresa' => $this->faker->numberBetween(1, 10),
            'codproveedor' => $this->faker->numberBetween(1000, 9999),
            'nif' => $this->faker->unique()->regexify('[A-Z]{1}\d{7}[A-Z]{1}'),
            'nombre' => $this->faker->company,
            'domicilio' => $this->faker->address,
            'localidad' => $this->faker->city,
            'codpostal' => $this->faker->numberBetween(1, 99999),
            'provincia' => $this->faker->state,
            'telefono1' => $this->faker->phoneNumber,
            'telefono2' => $this->faker->phoneNumber,
            'fax' => $this->faker->phoneNumber,
            'nrocuenta' => $this->faker->bankAccountNumber,
            'web' => substr($this->faker->url, 0, 50),
            'email' => $this->faker->unique()->safeEmail,
            'observaciones' => $this->faker->text(50),
            'rowid' => $this->faker->text(50),
            'contacto' => $this->faker->name,
            'personacontacto' => $this->faker->name,
            'cuentacont' => $this->faker->text(20),
        ];
    }
}
