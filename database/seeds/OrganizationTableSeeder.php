<?php

use Illuminate\Database\Seeder;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organization')->delete();

        $organizations = [
               ['id' => 1, 'address' => 'Av Presidente Roque Sáenz Peña 628', 'location' => 'Ciudad Autónoma de Buenos Aires', 'phone' => '+54 9 11 5032-7900','email' => 'talentos@4latam.com']
            ];
		
	DB::table('organization')->insert($organizations);
        
    }
}
