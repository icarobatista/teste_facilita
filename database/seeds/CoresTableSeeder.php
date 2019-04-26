<?php

use Illuminate\Database\Seeder;

class CoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('cores')->insert([
            'id'=>1,
            'nome'=>'Preto',
            'modificador'=>1,
            'variacao'=>500,
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('cores')->insert([
            'id'=>2,
            'nome'=>'Prata',
            'modificador'=>2,
            'variacao'=>700,
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('cores')->insert([
            'id'=>3,
            'nome'=>'Branco',
            'modificador'=>1,
            'variacao'=>1000,
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
