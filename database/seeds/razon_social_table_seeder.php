<?php

use Illuminate\Database\Seeder;

use app\RazonSocial;

class razon_social_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RazonSocial::create([
            'nombre' => 'EMPRESA PRUEBA',
            'alias' => 'CP',
            'ciudad' => 'LA PAZ',
            'dir' => 'ZONA LOS OLIVOS CALLE 3 #3232',
            'fono' => '21134568',
            'cel' => '78945612',
            'casilla' => '',
            'correo' => '',
            'web' => '',
            'logo' => 'logo.png',
            'actividad_economica' => 'ACTIVIDAD ECONOMICA',
        ]);
    }
}
