<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'module'        => 'Usuarios',
            'slug'          => 'usuario.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'module'        => 'Usuarios',
            'slug'          => 'usuario.show',
            'description'   => 'Ve en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de usuario',
            'module'        => 'Usuarios',
            'slug'          => 'usuario.create',
            'description'   => 'Podría crear nuevos usuario en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de usuarios',
            'module'        => 'Usuarios',
            'slug'          => 'usuario.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar usuario',
            'module'        => 'Usuarios',
            'slug'          => 'usuario.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'module'        => 'roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'module'        => 'roles',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de roles',
            'module'        => 'roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de roles',
            'module'        => 'roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar roles',
            'module'        => 'roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);

        //personaNarutal
        Permission::create([
            'name'          => 'Navegar Persona Narutal',
            'module'        => 'Personas Narutal',
            'slug'          => 'personaNarutal.index',
            'description'   => 'Lista y navega todos los Persona Narutal del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle Persona Narutal',
            'module'        => 'Personas Narutal',
            'slug'          => 'personaNarutal.show',
            'description'   => 'Ve en detalle cada Persona Narutal del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de Persona Narutal',
            'module'        => 'Personas Narutal',
            'slug'          => 'personaNarutal.create',
            'description'   => 'Podría crear nuevos Persona Narutal en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de Persona Narutal',
            'module'        => 'Personas Narutal',
            'slug'          => 'personaNarutal.edit',
            'description'   => 'Podría editar cualquier dato de un Persona Narutal del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Persona Narutal',
            'module'        => 'Personas Narutal',
            'slug'          => 'personaNarutal.destroy',
            'description'   => 'Podría eliminar cualquier Persona Narutal del sistema',
        ]);

        //persona juridica
        Permission::create([
            'name'          => 'Navegar Persona Juridica',
            'module'        => 'Personas juridica',
            'slug'          => 'personaJuridica.index',
            'description'   => 'Lista y navega todos los Persona Juridica del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle Persona Juridica',
            'module'        => 'Personas juridica',
            'slug'          => 'personaJuridica.show',
            'description'   => 'Ve en detalle cada Persona Juridica del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de Persona Juridica',
            'module'        => 'Personas juridica',
            'slug'          => 'personaJuridica.create',
            'description'   => 'Podría crear nuevos Persona Juridica en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de Persona Juridica',
            'module'        => 'Personas juridica',
            'slug'          => 'personaJuridica.edit',
            'description'   => 'Podría editar cualquier dato de un Persona Juridica del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Persona Juridica',
            'module'        => 'Personas juridica',
            'slug'          => 'personaJuridica.destroy',
            'description'   => 'Podría eliminar cualquier Persona Juridica del sistema',
        ]);

        //persona personaEmpleado
        Permission::create([
            'name'          => 'Navegar Persona Empleado',
            'module'        => 'Personas Empleado',
            'slug'          => 'personaEmpleado.index',
            'description'   => 'Lista y navega todos los Persona Empleado del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle Persona Empleado',
            'module'        => 'Personas Empleado',
            'slug'          => 'personaEmpleado.show',
            'description'   => 'Ve en detalle cada Persona Empleado del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de Persona Empleado',
            'module'        => 'Personas Empleado',
            'slug'          => 'personaEmpleado.create',
            'description'   => 'Podría crear nuevos Persona Empleado en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de Persona Empleado',
            'module'        => 'Personas Empleado',
            'slug'          => 'personaEmpleado.edit',
            'description'   => 'Podría editar cualquier dato de un Persona Empleado del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar Persona Empleado',
            'module'        => 'Personas Empleado',
            'slug'          => 'personaEmpleado.destroy',
            'description'   => 'Podría eliminar cualquier Persona Empleado del sistema',
        ]);

        //Empresa
        Permission::create([
            'name'          => 'Navegar empresa',
            'module'        => 'Empresa',
            'slug'          => 'empresa.index',
            'description'   => 'Lista y navega empresa del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de la empresa',
            'module'        => 'Empresa',
            'slug'          => 'empresa.show',
            'description'   => 'Ve en detalle cada tercero del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de empresa',
            'module'        => 'Empresa',
            'slug'          => 'empresa.create',
            'description'   => 'Podría crear nuevos tercero en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de empresa',
            'module'        => 'Empresa',
            'slug'          => 'empresa.edit',
            'description'   => 'Podría editar cualquier dato de una empresa del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar puc',
            'module'        => 'PUC',
            'slug'          => 'puc.destroy',
            'description'   => 'Podría eliminar cualquier PUC del sistema',
        ]);

        //PUC
        Permission::create([
            'name'          => 'Navegar puc',
            'module'        => 'PUC',
            'slug'          => 'puc.index',
            'description'   => 'Lista y navega PUC del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de la puc',
            'module'        => 'PUC',
            'slug'          => 'puc.show',
            'description'   => 'Ve en detalle cada PUC del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de puc',
            'module'        => 'PUC',
            'slug'          => 'puc.create',
            'description'   => 'Podría crear nuevos PUC en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de puc',
            'module'        => 'PUC',
            'slug'          => 'puc.edit',
            'description'   => 'Podría editar cualquier dato de una PUC del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar puc',
            'module'        => 'PUC',
            'slug'          => 'puc.destroy',
            'description'   => 'Podría eliminar cualquier PUC del sistema',
        ]);

        //cCUENTA INSTITUCIONALES
        Permission::create([
            'name'          => 'Navegar cuentasInstitucionales',
            'module'        => 'cuentasInstitucionales',
            'slug'          => 'cuentasInstitucionales.index',
            'description'   => 'Lista y navega cuenta Institucional del sistema',
        ]);
        Permission::create([
            'name'          => 'Ver detalle de la cuentasInstitucionales',
            'module'        => 'cuentasInstitucionales',
            'slug'          => 'cuentasInstitucionales.show',
            'description'   => 'Ve en detalle cada cuenta Institucional del sistema',
        ]);
        Permission::create([
            'name'          => 'Creación de cuentasInstitucionales',
            'module'        => 'cuentasInstitucionales',
            'slug'          => 'cuentasInstitucionales.create',
            'description'   => 'Podría crear nuevos cuenta Institucional en el sistema',
        ]);
        Permission::create([
            'name'          => 'Edición de cuentasInstitucionales',
            'module'        => 'cuentasInstitucionales',
            'slug'          => 'cuentasInstitucionales.edit',
            'description'   => 'Podría editar cualquier dato de una cuenta Institucional del sistema',
        ]);
        Permission::create([
            'name'          => 'Eliminar cuentasInstitucionales',
            'module'        => 'cuentasInstitucionales',
            'slug'          => 'cuentasInstitucionales.destroy',
            'description'   => 'Podría eliminar cualquier cuenta Institucional del sistema',
        ]);

    }
}
