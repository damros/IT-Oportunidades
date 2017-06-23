<?php

use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidates')->delete();

        $candidates = [
            ['id' => 1, 'name' => 'Candidato Ejemplo', 'identification' => '123456789', 'phone' => '1234567', 'address' => 'Calle 123', 'user_id' => '1'],
        ];
		
		DB::table('candidates')->insert($candidates);
    }
}
