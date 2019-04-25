<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('marcas')->insert([
            'id'=>1,
            'nome'=>'Fiat',
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('marcas')->insert([
            'id'=>2,
            'nome'=>'Volkswagen',
            'created_at'=>date('Y-m-d H:i:s')
        ]);

        DB::table('marcas')->insert([
            'id'=>3,
            'nome'=>'Hyundai',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
