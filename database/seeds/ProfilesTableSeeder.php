<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->delete();

        $profiles = [
            ['id' => 1, 'name' => 'Admin', 'code' => 'ad'],
            ['id' => 3, 'name' => 'Candidato', 'code' => 'ca'],
            ['id' => 4, 'name' => 'Empresa', 'code' => 'co'],
        ];
		
		DB::table('profiles')->insert($profiles);
    }
}
