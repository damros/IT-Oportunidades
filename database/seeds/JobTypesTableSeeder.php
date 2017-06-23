<?php

use Illuminate\Database\Seeder;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->delete();

        $jobtypes = [
            ['id' => 1, 'name' => 'Full-Time'],
            ['id' => 2, 'name' => 'Part-Time'],
        ];
		
		DB::table('job_types')->insert($jobtypes);
    }
}