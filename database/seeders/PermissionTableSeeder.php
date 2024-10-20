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

            'document-list',
            'document-create',
            'document-edit',
            'document-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',
            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',
            'slideshow-list',
            'slideshow-create',
            'slideshow-edit',
            'slideshow-delete',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
