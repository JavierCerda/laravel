<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('alumnos')->insert([ 
            ['nombre'=>"javier",'telf'=>"644727350",'edad'=>20,'contraseña'=>"123",'correo'=>"javiercerdaibaez@gmail.com",'sexo'=>"hombre"],
            ['nombre'=>"fran",'telf'=>"654564654",'edad'=>19,'contraseña'=>"321",'correo'=>"fran@gmail.com",'sexo'=>"mujer"],
            ['nombre'=>"vicente",'telf'=>"234234324",'edad'=>20,'contraseña'=>"234",'correo'=>"234fsdfsff@gmail.ocm",'sexo'=>"mujer"]


        ]);
        //
    }
}
