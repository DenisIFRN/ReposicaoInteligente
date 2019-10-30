<?php

use Illuminate\Database\Seeder;

class RequerimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Requerimento::class, 6)->create();
    }
}
