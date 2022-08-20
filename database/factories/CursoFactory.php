<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    public $tipos = ["Iniciación", "Comunión I", "Comunión II", "Año Bíblico", "Confirmación I", "Confirmación II"];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $element = $this->faker->randomElement($this->tipos);
        $nivel = array_search($element, $this->tipos) + 1;
        return [
            //
            "nivel_cur" => $nivel,
            "nombre_cur" => $element,
            "disponibilidad_cur" => $this->faker->numberBetween(0, 1),
            "fecha_inicio_cur" => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            "responsable_cur" => $this->faker->name(),
            "costo_cur" => $this->faker->randomFloat(2, 0, 100),
            "comentario_cur" => $this->faker->paragraph(),
        ];
    }
}
