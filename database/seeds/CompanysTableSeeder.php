<?php

use Illuminate\Database\Seeder;

class CompanysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companys')->delete();

        $companys = [
            ['id' => 1, 'name' => 'Empresa Ejemplo', 'identification' => '123456789', 'phone' => '1234567', 'address' => 'Calle 123', 'user_id' => '2'],
        ];
		
		DB::table('companys')->insert($companys);
    }
}
