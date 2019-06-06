<?php

use Illuminate\Database\Seeder;
use Estoque\Entities\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Categoria::class)->create();
    }
}
