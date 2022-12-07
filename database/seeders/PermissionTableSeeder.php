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
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'document-list',
            'document-create',
            'document-edit',
            'document-delete',
            'activity-list',
            'activity-create',
            'activity-edit',
            'activity-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
