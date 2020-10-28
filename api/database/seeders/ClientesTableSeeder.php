<?php

namespace Database\Seeders;
use App\Models\Clientes;
use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Clientes::class, 10)->create();
    }
}
