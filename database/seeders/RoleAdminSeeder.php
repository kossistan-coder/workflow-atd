<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Role_Admin;
use Illuminate\Database\Seeder;

class RoleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminRole::insert([
            'role_id' => 2,
            'admin_id' => 1,
        ]);
    }
}
