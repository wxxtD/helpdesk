<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

        //  'requete-list',
        // 'requete-create',
        // 'requete-edit',
        // 'requete-delete',



        'materiel-list',
        'materiel-create',
        'materiel-edit',
        'materiel-delete',

        // 'requete-resoudre',
        //    'logiciel-create',
        //    'logiciel-edit',
        //    'logiciel-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
