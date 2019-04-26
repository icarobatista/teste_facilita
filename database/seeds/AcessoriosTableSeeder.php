<?php

use Illuminate\Database\Seeder;

class AcessoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('acessorios')->insert([
            'id'=>1,
            'nome'=>'Rodas de liga Leve',
            'cor_id'=>1,
            'marca_id'=>1,
            'modificador_id'=>1,
            'valor'=>500,
            'created_at'=>date('Y-m-d H:i:s')

        ]);
    }
}
