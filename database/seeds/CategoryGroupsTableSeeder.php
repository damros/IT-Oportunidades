<?php

use Illuminate\Database\Seeder;

class CategoryGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_groups')->delete();

        $categorygroups = [
            ['id' => 1, 'name' => 'Desarrollador'],
            ['id' => 2, 'name' => 'Analista'],
        ];
		
		DB::table('category_groups')->insert($categorygroups);
    }
}
