<?php

use app\Permiso;
use app\UserPermiso;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permiso::create([
            'modulo' => 'TODOS'
        ]);

        UserPermiso::create([
            'user_id' => 1,
            'permiso_id' => 1,
        ]);

        // USUARIOS
        Permiso::create([
            'modulo' => 'USUARIOS',
            'nombre' => 'users.index',
            'descripcion' => 'VER LA LISTA DE USUARIOS'
        ]);
        Permiso::create([
            'modulo' => 'USUARIOS',
            'nombre' => 'users.create',
            'descripcion' => 'CREAR USUARIOS'
        ]);
        Permiso::create([
            'modulo' => 'USUARIOS',
            'nombre' => 'users.edit',
            'descripcion' => 'EDITAR USUARIOS'
        ]);
        Permiso::create([
            'modulo' => 'USUARIOS',
            'nombre' => 'users.destroy',
            'descripcion' => 'ELIMINAR USUARIOS'
        ]);

        // USUARIOS PERMISOS
        Permiso::create([
            'modulo' => 'USUARIOS PERMISOS',
            'nombre' => 'user_permisos.index',
            'descripcion' => 'VER LA LISTA DE PERMISOS DE UN USUARIO'
        ]);

        Permiso::create([
            'modulo' => 'USUARIOS PERMISOS',
            'nombre' => 'user_permisos.edit',
            'descripcion' => 'MODIFICAR LOS PERMISOS DE USUARIOS'
        ]);

        // EMPRESA
        Permiso::create([
            'modulo' => 'EMPRESA',
            'nombre' => 'empresa.index',
            'descripcion' => 'VER INFORMACIÓN DE LA EMPRESA'
        ]);

        Permiso::create([
            'modulo' => 'EMPRESA',
            'nombre' => 'empresa.edit',
            'descripcion' => 'EDITAR INFORMACIÓN DE LA EMPRESA'
        ]);

        // PERSONAL
        Permiso::create([
            'modulo' => 'PERSONAL',
            'nombre' => 'personals.index',
            'descripcion' => 'VER LA LISTA DE PERSONAL'
        ]);
        Permiso::create([
            'modulo' => 'PERSONAL',
            'nombre' => 'personals.create',
            'descripcion' => 'CREAR PERSONAL'
        ]);
        Permiso::create([
            'modulo' => 'PERSONAL',
            'nombre' => 'personals.edit',
            'descripcion' => 'EDITAR PERSONAL'
        ]);
        Permiso::create([
            'modulo' => 'PERSONAL',
            'nombre' => 'personals.destroy',
            'descripcion' => 'ELIMINAR PERSONAL'
        ]);

        // CLIENTES
        Permiso::create([
            'modulo' => 'CLIENTES',
            'nombre' => 'clientes.index',
            'descripcion' => 'VER LA LISTA DE CLIENTES'
        ]);
        Permiso::create([
            'modulo' => 'CLIENTES',
            'nombre' => 'clientes.create',
            'descripcion' => 'CREAR CLIENTES'
        ]);
        Permiso::create([
            'modulo' => 'CLIENTES',
            'nombre' => 'clientes.edit',
            'descripcion' => 'EDITAR CLIENTES'
        ]);
        Permiso::create([
            'modulo' => 'CLIENTES',
            'nombre' => 'clientes.destroy',
            'descripcion' => 'ELIMINAR CLIENTES'
        ]);

        // ORDEN DE TRABAJO
        Permiso::create([
            'modulo' => 'ORDEN DE TRABAJO',
            'nombre' => 'orden_trabajos.index',
            'descripcion' => 'VER LA LISTA DE ORDEN DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'ORDEN DE TRABAJO',
            'nombre' => 'orden_trabajos.create',
            'descripcion' => 'CREAR ORDEN DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'ORDEN DE TRABAJO',
            'nombre' => 'orden_trabajos.edit',
            'descripcion' => 'EDITAR ORDEN DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'ORDEN DE TRABAJO',
            'nombre' => 'orden_trabajos.destroy',
            'descripcion' => 'ELIMINAR ORDEN DE TRABAJO'
        ]);

        // CONTROL TRABAJO
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO',
            'nombre' => 'control_trabajos.index',
            'descripcion' => 'VER LA LISTA DE CONTROL DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO',
            'nombre' => 'control_trabajos.create',
            'descripcion' => 'CREAR CONTROL DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO',
            'nombre' => 'control_trabajos.edit',
            'descripcion' => 'EDITAR CONTROL DE TRABAJO'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO',
            'nombre' => 'control_trabajos.destroy',
            'descripcion' => 'ELIMINAR CONTROL DE TRABAJO'
        ]);

        // TRABAJO DETALLE
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO DETALLE',
            'nombre' => 'trabajo_detalles.index',
            'descripcion' => 'VER LA LISTA DE CONTROL DE TRABAJO DETALLE'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO DETALLE',
            'nombre' => 'trabajo_detalles.create',
            'descripcion' => 'CREAR CONTROL DE TRABAJO DETALLE'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO DETALLE',
            'nombre' => 'trabajo_detalles.edit',
            'descripcion' => 'EDITAR CONTROL DE TRABAJO DETALLE'
        ]);
        Permiso::create([
            'modulo' => 'CONTROL DE TRABAJO DETALLE',
            'nombre' => 'trabajo_detalles.destroy',
            'descripcion' => 'ELIMINAR CONTROL DE TRABAJO DETALLE'
        ]);

        // EQUIPO MAQUINARIA
        Permiso::create([
            'modulo' => 'EQUIPOS Y MAQUINARIAS',
            'nombre' => 'equipo_maquinarias.index',
            'descripcion' => 'VER LA LISTA DE EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'EQUIPOS Y MAQUINARIAS',
            'nombre' => 'equipo_maquinarias.create',
            'descripcion' => 'CREAR EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'EQUIPOS Y MAQUINARIAS',
            'nombre' => 'equipo_maquinarias.edit',
            'descripcion' => 'EDITAR EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'EQUIPOS Y MAQUINARIAS',
            'nombre' => 'equipo_maquinarias.destroy',
            'descripcion' => 'ELIMINAR EQUIPOS Y MAQUINARIAS'
        ]);

        // MANTENIMIENTO
        Permiso::create([
            'modulo' => 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS',
            'nombre' => 'mantenimiento_equipo_maquinarias.index',
            'descripcion' => 'VER LA LISTA DE MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS',
            'nombre' => 'mantenimiento_equipo_maquinarias.create',
            'descripcion' => 'CREAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS',
            'nombre' => 'mantenimiento_equipo_maquinarias.edit',
            'descripcion' => 'EDITAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS'
        ]);
        Permiso::create([
            'modulo' => 'MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS',
            'nombre' => 'mantenimiento_equipo_maquinarias.destroy',
            'descripcion' => 'ELIMINAR MANTENIMIENTO DE EQUIPOS Y MAQUINARIAS'
        ]);

        // CUENTA BANCARIAS
        Permiso::create([
            'modulo' => 'CUENTAS BANCARIAS',
            'nombre' => 'cuenta_bancarias.index',
            'descripcion' => 'VER LA LISTA DE CUENTAS BANCARIAS'
        ]);
        Permiso::create([
            'modulo' => 'CUENTAS BANCARIAS',
            'nombre' => 'cuenta_bancarias.create',
            'descripcion' => 'CREAR CUENTAS BANCARIAS'
        ]);
        Permiso::create([
            'modulo' => 'CUENTAS BANCARIAS',
            'nombre' => 'cuenta_bancarias.edit',
            'descripcion' => 'EDITAR CUENTAS BANCARIAS'
        ]);
        Permiso::create([
            'modulo' => 'CUENTAS BANCARIAS',
            'nombre' => 'cuenta_bancarias.destroy',
            'descripcion' => 'ELIMINAR CUENTAS BANCARIAS'
        ]);

        // NIT
        Permiso::create([
            'modulo' => 'NIT',
            'nombre' => 'nits.index',
            'descripcion' => 'VER LA LISTA DE NIT'
        ]);
        Permiso::create([
            'modulo' => 'NIT',
            'nombre' => 'nits.create',
            'descripcion' => 'CREAR NIT'
        ]);
        Permiso::create([
            'modulo' => 'NIT',
            'nombre' => 'nits.edit',
            'descripcion' => 'EDITAR NIT'
        ]);
        Permiso::create([
            'modulo' => 'NIT',
            'nombre' => 'nits.destroy',
            'descripcion' => 'ELIMINAR NIT'
        ]);

        // NOTAS DE DEBITO
        Permiso::create([
            'modulo' => 'NOTAS DE DEBITO',
            'nombre' => 'nota_debitos.index',
            'descripcion' => 'VER LA LISTA DE NOTAS DE DEBITO'
        ]);
        Permiso::create([
            'modulo' => 'NOTAS DE DEBITO',
            'nombre' => 'nota_debitos.create',
            'descripcion' => 'CREAR NOTAS DE DEBITO'
        ]);
        Permiso::create([
            'modulo' => 'NOTAS DE DEBITO',
            'nombre' => 'nota_debitos.edit',
            'descripcion' => 'EDITAR NOTAS DE DEBITO'
        ]);
        Permiso::create([
            'modulo' => 'NOTAS DE DEBITO',
            'nombre' => 'nota_debitos.destroy',
            'descripcion' => 'ELIMINAR NOTAS DE DEBITO'
        ]);

        // CAJA
        Permiso::create([
            'modulo' => 'CAJA',
            'nombre' => 'cajas.index',
            'descripcion' => 'VER LA LISTA DE CAJA'
        ]);
        Permiso::create([
            'modulo' => 'CAJA',
            'nombre' => 'cajas.create',
            'descripcion' => 'CREAR CAJA'
        ]);
        Permiso::create([
            'modulo' => 'CAJA',
            'nombre' => 'cajas.edit',
            'descripcion' => 'EDITAR CAJA'
        ]);
        Permiso::create([
            'modulo' => 'CAJA',
            'nombre' => 'cajas.destroy',
            'descripcion' => 'ELIMINAR CAJA'
        ]);

        // ANTICIPOS
        Permiso::create([
            'modulo' => 'ANTICIPOS',
            'nombre' => 'anticipos.index',
            'descripcion' => 'VER LA LISTA DE ANTICIPOS'
        ]);
        Permiso::create([
            'modulo' => 'ANTICIPOS',
            'nombre' => 'anticipos.create',
            'descripcion' => 'CREAR ANTICIPOS'
        ]);
        Permiso::create([
            'modulo' => 'ANTICIPOS',
            'nombre' => 'anticipos.edit',
            'descripcion' => 'EDITAR ANTICIPOS'
        ]);
        Permiso::create([
            'modulo' => 'ANTICIPOS',
            'nombre' => 'anticipos.destroy',
            'descripcion' => 'ELIMINAR ANTICIPOS'
        ]);

         // CHEQUES
         Permiso::create([
            'modulo' => 'CHEQUES',
            'nombre' => 'cheques.index',
            'descripcion' => 'VER LA LISTA DE CHEQUES'
        ]);
        Permiso::create([
            'modulo' => 'CHEQUES',
            'nombre' => 'cheques.create',
            'descripcion' => 'CREAR CHEQUES'
        ]);
        Permiso::create([
            'modulo' => 'CHEQUES',
            'nombre' => 'cheques.edit',
            'descripcion' => 'EDITAR CHEQUES'
        ]);
        Permiso::create([
            'modulo' => 'CHEQUES',
            'nombre' => 'cheques.destroy',
            'descripcion' => 'ELIMINAR CHEQUES'
        ]);

        // REPORTES
        Permiso::create([
            'modulo' => 'REPORTES',
            'nombre' => 'reportes.index',
            'descripcion' => 'VER Y GENERAR REPORTES'
        ]);

        // COMPRAS
        Permiso::create([
            'modulo' => 'COMPRAS',
            'nombre' => 'compras.index',
            'descripcion' => 'VER LA LISTA DE COMPRAS'
        ]);
        Permiso::create([
            'modulo' => 'COMPRAS',
            'nombre' => 'compras.create',
            'descripcion' => 'CREAR COMPRAS'
        ]);
        Permiso::create([
            'modulo' => 'COMPRAS',
            'nombre' => 'compras.edit',
            'descripcion' => 'EDITAR COMPRAS'
        ]);
        Permiso::create([
            'modulo' => 'COMPRAS',
            'nombre' => 'compras.destroy',
            'descripcion' => 'ELIMINAR COMPRAS'
        ]);

        // VENTAS
        Permiso::create([
            'modulo' => 'VENTAS',
            'nombre' => 'ventas.index',
            'descripcion' => 'VER LA LISTA DE VENTAS'
        ]);
        Permiso::create([
            'modulo' => 'VENTAS',
            'nombre' => 'ventas.create',
            'descripcion' => 'CREAR VENTAS'
        ]);
        Permiso::create([
            'modulo' => 'VENTAS',
            'nombre' => 'ventas.edit',
            'descripcion' => 'EDITAR VENTAS'
        ]);
        Permiso::create([
            'modulo' => 'VENTAS',
            'nombre' => 'ventas.destroy',
            'descripcion' => 'ELIMINAR VENTAS'
        ]);

        // VACACIONES
        Permiso::create([
            'modulo' => 'VACACIONES',
            'nombre' => 'vacacions.index',
            'descripcion' => 'VER LA LISTA DE VACACIONES'
        ]);
        Permiso::create([
            'modulo' => 'VACACIONES',
            'nombre' => 'vacacions.create',
            'descripcion' => 'CREAR VACACIONES'
        ]);
        Permiso::create([
            'modulo' => 'VACACIONES',
            'nombre' => 'vacacions.edit',
            'descripcion' => 'EDITAR VACACIONES'
        ]);
        Permiso::create([
            'modulo' => 'VACACIONES',
            'nombre' => 'vacacions.destroy',
            'descripcion' => 'ELIMINAR VACACIONES'
        ]);
    }
}
