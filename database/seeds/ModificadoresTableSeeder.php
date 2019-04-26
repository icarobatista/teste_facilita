<?php

use Illuminate\Database\Seeder;

class ModificadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('modificadores')->insert([
            'id'=>1,
            'nome'=>'Acréscimo',

        ]);
        DB::table('modificadores')->insert([
            'id'=>2,
            'nome'=>'Desconto',

        ]);
    }
}
