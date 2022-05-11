<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla regionals
            'ver-regional',
            'crear-regional',
            'editar-regional',
            'borrar-regional',

            //Operacions sobre tabla contratos
            'ver-contrato',
            'crear-contrato',
            'editar-contrato',
            'borrar-contrato',

            //Operacions sobre tabla oservicios
            'ver-oservicio',
            'crear-oservicio',
            'editar-oservicio',
            'borrar-oservicio',

            //Operacions sobre tabla oatencions
            'ver-oatencion',
            'crear-oatencion',
            'editar-oatencion',
            'borrar-oatencion',

            //Operacions sobre tabla facturacion
            'ver-facturacion',
            'crear-facturacion',
            'editar-facturacion',
            'borrar-facturacion',

            //Operacions sobre tabla auditoria
            'ver-auditoria',
            'crear-auditoria',
            'editar-auditoria',
            'borrar-auditoria',

            //Operacions sobre tabla beneficiarios
            'ver-beneficiario',
            'crear-beneficiario',
            'editar-beneficiario',
            'borrar-beneficiario',

            //Operacions sobre tabla funcionarios
            'ver-funcionarios',
            'crear-funcionarios',
            'editar-funcionarios',
            'borrar-funcionarios',

            //Operacions sobre tabla supervisores
            'ver-supervisor',
            'crear-supervisor',
            'editar-supervisor',
            'borrar-supervisor',

            //Operacions sobre tabla revision juridica
            'ver-rjuridica',
            'crear-rjuridica',
            'editar-rjuridica',
            'borrar-rjuridica',

            //Operacions sobre tabla validacion
            'ver-validador',
            'crear-validador',
            'editar-validador',
            'borrar-validador',



        ];


        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
