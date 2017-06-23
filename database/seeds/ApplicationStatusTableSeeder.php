<?php

use Illuminate\Database\Seeder;

class ApplicationStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_status')->delete();

        $applicationstatus = [
            ['id' => 1, 'name' => 'Nueva', 'code' => 'new'],
            ['id' => 2, 'name' => 'Entrevistado', 'code' => 'itvw'],
            ['id' => 3, 'name' => 'Contratado', 'code' => 'hird'],
            ['id' => 4, 'name' => 'Archivado', 'code' => 'acvd'],
        ];
		
		DB::table('application_status')->insert($applicationstatus);
    }
}
