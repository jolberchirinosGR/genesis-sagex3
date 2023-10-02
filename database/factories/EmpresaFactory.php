<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
            'idempresa' => $this->faker->unique()->numberBetween(1, 10),
            'empresa' => $this->faker->company,
            'mid' => $this->faker->randomNumber(),
            'rowid' => $this->faker->unique()->word,
            'foto' => $this->faker->word,
            'razonsocial' => $this->faker->company,
            'cif' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'direccion' => substr($this->faker->streetAddress, 0, 30),
            'poblacion' => $this->faker->city,
            'codpostal' => $this->faker->numberBetween(1, 99999),
            'provincia' => $this->faker->state,
        ];
    }
}
