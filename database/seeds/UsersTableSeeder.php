<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            ['id' => 1, 'name' => 'Candidato', 'email' => 'candidato@mail.com', 'password' => bcrypt('123'),'profile_id' => '3','activated' => '1'],
            ['id' => 2, 'name' => 'Empresa', 'email' => 'empresa@mail.com', 'password' => bcrypt('123'),'profile_id' => '4','activated' => '1'],
            ['id' => 3, 'name' => 'Admin', 'email' => 'admin@mail.com', 'password' => bcrypt('123'),'profile_id' => '1','activated' => '1'],
        ];
		
		DB::table('users')->insert($users);
        
    }
}
