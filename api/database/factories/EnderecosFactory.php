<?php

namespace Database\Factories;

use App\Models\Enderecos;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnderecosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enderecos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('pt_BR');
        return [
            'ClienteId' => rand(1, 10),
            'logradouro' => $faker->streetAddress,
            'bairro' => $faker->stateAbbr,
            'numero' => rand (1, 255),
            'cep' => $faker->postcode ,
        ];
    }
}
