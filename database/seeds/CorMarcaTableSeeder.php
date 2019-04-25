<?php

use Illuminate\Database\Seeder;

class CorMarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cores da Fiat
        DB::table('cor_marca')->insert([
            'marca_id'=>1,
            'cor_id'=>1
        ]);

        DB::table('cor_marca')->insert([
            'marca_id'=>1,
            'cor_id'=>3
        ]);

        //Cor da Wolkswagen
        DB::table('cor_marca')->insert([
            'marca_id'=>2,
            'cor_id'=>2
        ]);

        //Cores da Hyundai

        DB::table('cor_marca')->insert([
            'marca_id'=>3,
            'cor_id'=>1
        ]);

        DB::table('cor_marca')->insert([
            'marca_id'=>3,
            'cor_id'=>2
        ]);

        DB::table('cor_marca')->insert([
            'marca_id'=>3,
            'cor_id'=>3
        ]);



    }
}
