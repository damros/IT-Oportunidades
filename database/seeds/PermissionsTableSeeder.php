<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();

        $permissions = [
            ['id' => 1, 'name' => 'user-add', 'description' => 'Permite agregar un usuario'],
            ['id' => 2, 'name' => 'user-delete', 'description' => 'Permite borrar un usuario'],
            ['id' => 3, 'name' => 'candidate-resume', 'description' => 'Permite administrar el curriculum a un candidato'],
            ['id' => 4, 'name' => 'candidate-jobs', 'description' => 'Permite ver la bolsa de trabajo a los candidatos'],
            ['id' => 5, 'name' => 'candidate-job-apply', 'description' => 'Permite que un candidato se postule a una busqueda'],
            ['id' => 6, 'name' => 'company-jobs-add', 'description' => 'Permite agregar una búsqueda a una empresa'],
            ['id' => 7, 'name' => 'company-jobs-manage', 'description' => 'Permite administrar las búsquedas a una empresa'],
            ['id' => 8, 'name' => 'company-applications', 'description' => 'Permite ver los postulantes a las búsquedas de una empresa'],
            ['id' => 9, 'name' => 'candidate-job-detail', 'description' => 'Permite ver el detalle de una búsqueda a un candidato'],
            ['id' => 10, 'name' => 'company-resumes-browse', 'description' => 'Permite ver los curriculums de los postulantes de una emrpesa'],
            ['id' => 11, 'name' => 'company-jobs-edit', 'description' => 'Permite ver la pantalla de edición de requerimientos'],
            ['id' => 12, 'name' => 'company-edit-profile', 'description' => 'Permite ver la pantalla de editar perfil de empresa'],
            ['id' => 13, 'name' => 'candidates-by-job', 'description' => 'Permite ver los candidatos de un requerimiento'],
            ['id' => 14, 'name' => 'candidate-detail', 'description' => 'Permite ver el detalle de un candidato'],
        ];
		
		DB::table('permissions')->insert($permissions);
    }
}
