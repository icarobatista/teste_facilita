<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CoresTableSeeder::class);
         $this->call(MarcasTableSeeder::class);
         $this->call(CorMarcaTableSeeder::class);
         $this->call(ModificadoresTableSeeder::class);
         $this->call(AcessoriosTableSeeder::class);
    }
}
