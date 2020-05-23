<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permissions\Models\Role;
use App\Permissions\Models\Permiso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PermissionsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate a tablas
        DB::statement("SET foreign_key_checks=0");
            DB::table('role_user')->truncate();
            DB::table('permiso_role')->truncate();
            Permiso::truncate();
            Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        //Admin
        $useradmin = User::where('email', 'admin@kuepa.com')->first();
        if($useradmin){
            $useradmin->delete();
        }
        $useradmin = User::create([
            'name' => 'admin',
            'lastname' => 'Kuepa',
            'email' => 'admin@kuepa.com',
            'password' => Hash::Make('admin'),
            'program_interest' => 'NA',
        ]);

        //Rol Admin
        $roladmin = Role::create([
            'nombre' => 'Admin Kuepa',
            'slug' => 'admin',
            'descripcion' => 'Administrador total del sistema, control en todo',
            'full-acceso' => 'si',
        ]);

        $useradmin->roles()->sync([$roladmin->id]);

        //Permisos para roles
        $permisos_arreglo = [];
        
            $permiso = Permiso::create([
                'nombre' => 'Listar roles',
                'slug' => 'role.index',
                'descripcion' => 'El usuario puede listar los roles existentes',
            ]);

            $permisos_arreglo[] = $permiso->id; 

            $permiso = Permiso::create([
                'nombre' => 'Mostrar rol',
                'slug' => 'role.show',
                'descripcion' => 'El usuario puede mostrar un rol',
            ]);

            $permisos_arreglo[] = $permiso->id; 

            $permiso = Permiso::create([
                'nombre' => 'Crear rol',
                'slug' => 'role.create',
                'descripcion' => 'El usuario puede crear un rol',
            ]);

            $permisos_arreglo[] = $permiso->id; 

            $permiso = Permiso::create([
                'nombre' => 'Editar rol',
                'slug' => 'role.edit',
                'descripcion' => 'El usuario puede editar un rol',
            ]);

            $permiso_arpermisos_arregloreglo[] = $permiso->id; 

            $permiso = Permiso::create([
                'nombre' => 'Borrar rol',
                'slug' => 'role.destroy',
                'descripcion' => 'El usuario puede eliminar un rol',
            ]);

            $permisos_arreglo[] = $permiso->id; 

        //Tabla Rol - Usuario
        $roladmin->permisos()->sync( $permisos_arreglo );

        //Permisos para usuarios        
        $permiso = Permiso::create([
            'nombre' => 'Listar usuarios',
            'slug' => 'user.index',
            'descripcion' => 'El usuario puede listar los usuarios existentes',
        ]);

        $permisos_arreglo[] = $permiso->id; 

        $permiso = Permiso::create([
            'nombre' => 'Mostrar usuario',
            'slug' => 'user.show',
            'descripcion' => 'El usuario puede mostrar un usuario',
        ]);

        $permisos_arreglo[] = $permiso->id; 

        $permiso = Permiso::create([
            'nombre' => 'Crear usuario',
            'slug' => 'user.create',
            'descripcion' => 'El usuario puede crear un usuario',
        ]);

        $permisos_arreglo[] = $permiso->id; 

        $permiso = Permiso::create([
            'nombre' => 'Editar usuario',
            'slug' => 'user.edit',
            'descripcion' => 'El usuario puede editar un usuario',
        ]);

        $permiso_arpermisos_arregloreglo[] = $permiso->id; 

        $permiso = Permiso::create([
            'nombre' => 'Borrar usuario',
            'slug' => 'user.destroy',
            'descripcion' => 'El usuario puede eliminar un usuario',
        ]);

        $permisos_arreglo[] = $permiso->id; 

        //Tabla Rol - Usuario
        $roladmin->permisos()->sync( $permisos_arreglo );
    }
}
