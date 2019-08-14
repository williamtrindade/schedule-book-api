<?php

use Illuminate\Database\Seeder;

class AtividadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $atividades = factory(App\Atividade::class, 20)->create();
    }
}
