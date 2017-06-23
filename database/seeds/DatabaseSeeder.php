<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(ApplicationStatusTableSeeder::class);
		//$this->call(ProfilesTableSeeder::class);	
		$this->call(UsersTableSeeder::class);			
		$this->call(CandidatesTableSeeder::class);	
		$this->call(CompanysTableSeeder::class);		
		$this->call(CategoryGroupsTableSeeder::class);		
		$this->call(CategoryTableSeeder::class);		
		$this->call(JobTypesTableSeeder::class);		
		$this->call(PermissionsTableSeeder::class);		
		$this->call(ProfilesPermissionsTableSeeder::class);			
    }
}
