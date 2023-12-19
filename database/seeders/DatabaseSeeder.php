<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('groups')->insert([
            [
                'code' => 'g_manage',
                'name' => 'Quản lí',
                'role_id' => 1,
            ],
            [
                'code' => 'g_staff',
                'name' => 'Nhân viên',
                'role_id' => 2,
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Lê Duy',
                'username' => 'admin',
                'email' => 'duyleit98@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0395275858',
                'address' => 'Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Lê Duy',
                'username' => 'duyl',
                'email' => 'kizorry@gmail.com',
                'password' => Hash::make('123456'),
                'phone' => '0395275858',
                'address' => 'Nam Từ Liêm, Hà Nội',
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now(),
            ],
        ]);
        
        DB::table('permissions')->insert([
            ['name' => 'view_user'],
            ['name' => 'create_user'],
            ['name' => 'update_user'],
            ['name' => 'delete_user'],
        ]);
        
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'staff'],
        ]);
        DB::table('user_role')->insert([
            [
                'role_id' => 1,
                'user_id' => 1,
            ],
            [
                'role_id' => 2,
                'user_id' => 2,
            ],
        ]);
        DB::table('role_permission')->insert([
            ['role_id' => 1,'permisison_id' => 1, ],
            ['role_id' => 1,'permisison_id' => 2, ],
            ['role_id' => 1,'permisison_id' => 3, ],
            ['role_id' => 1,'permisison_id' => 4, ],
            ['role_id' => 2,'permisison_id' => 1, ],
            
        ]);
        
    }
}
