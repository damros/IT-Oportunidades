<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->delete();

        $categorys = [
            ['id' => 1, 'name' => 'PHP', 'category_group_id' => '1'],
            ['id' => 2, 'name' => '.NET', 'category_group_id' => '1'],
        ];
		
		DB::table('categorys')->insert($categorys);
    }
}
