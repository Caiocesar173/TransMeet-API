<?php

namespace Database\Seeders;

use App\Models\Enderecos;
use Illuminate\Database\Seeder;

class EnderecosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Enderecos::class, 10)->create();
    }
}
