<?php

use Illuminate\Database\Seeder;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        for($i = 1; $i <= 20; $i++){
            DB::table('frutas')->insert([
                'nombre' => 'Cereza '.$i,
                'descripcion' => 'descripcion de la fruta '.$i,
                'precio' => $i,
                'fecha' => date('Y-m-d')
            ]);
        }
        $this->command->info('la tabla de frutas ha sido rellenada');
    }
}
