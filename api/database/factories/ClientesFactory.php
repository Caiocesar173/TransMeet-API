<?php

namespace Database\Factories;

use App\Models\Clientes;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        
        $faker = FakerFactory::create('pt_BR');
        return [
            'nomeFantasia' => $faker->name,
            'razaoSocial' => $faker->name,
            'Cnpj' => $faker->cnpj,
        ];
    }
}
