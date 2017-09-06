<?php

use Illuminate\Database\Seeder;

class ProfilesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles_permissions')->delete();

        $ppermissions = [
            ['id' => 1, 'profile_id' => '1', 'permission_id' => '1'],
            ['id' => 2, 'profile_id' => '1', 'permission_id' => '2'],
            ['id' => 3, 'profile_id' => '3', 'permission_id' => '3'],
            ['id' => 4, 'profile_id' => '3', 'permission_id' => '4'],
            ['id' => 5, 'profile_id' => '3', 'permission_id' => '5'],
            ['id' => 6, 'profile_id' => '4', 'permission_id' => '6'],
            ['id' => 7, 'profile_id' => '4', 'permission_id' => '7'],
            ['id' => 8, 'profile_id' => '4', 'permission_id' => '8'],
            ['id' => 9, 'profile_id' => '4', 'permission_id' => '9'],
            ['id' => 10, 'profile_id' => '4', 'permission_id' => '10'],
            ['id' => 11, 'profile_id' => '4', 'permission_id' => '11'],
            ['id' => 12, 'profile_id' => '4', 'permission_id' => '12'],
            ['id' => 13, 'profile_id' => '4', 'permission_id' => '13'],
            ['id' => 14, 'profile_id' => '4', 'permission_id' => '14'],

        ];
		
		DB::table('profiles_permissions')->insert($ppermissions);
    }
}
