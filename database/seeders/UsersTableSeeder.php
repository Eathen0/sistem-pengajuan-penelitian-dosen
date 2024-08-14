<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $jabatan_1 = DB::table('jabatans')->insertGetId(['nama' => 'Asisten Ahli']);
        $jabatan_2 = DB::table('jabatans')->insertGetId(['nama' => 'Rektor']);
        $jabatan_3 = DB::table('jabatans')->insertGetId(['nama' => 'Rektor Kepala']);
        $jabatan_4 = DB::table('jabatans')->insertGetId(['nama' => 'Guru Besar']);
        
        // Create users with three roles
        $user1 = DB::table('users')->insertGetId([
            'nidn' => '01110111',
            'nama' => 'user1',
            'email' => 'user1@example.com',
            'nip' => 'test-nip-1000',
            'no_telepon' => '081234567890',
            'id_jabatan' => $jabatan_1,
            'rumpun' => 'Management',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2 = DB::table('users')->insertGetId([
            'nidn' => '102021',
            'nama' => 'user2',
            'email' => 'user2@example.com',
            'nip' => 'test-nip-2000',
            'no_telepon' => '081234567891',
            'id_jabatan' => $jabatan_2,
            'rumpun' => 'Science',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user3 = DB::table('users')->insertGetId([
            'nidn' => '202031',
            'nama' => 'user3',
            'email' => 'user3@example.com',
            'nip' => 'test-nip-3000',
            'no_telepon' => '081234567892',
            'id_jabatan' => $jabatan_3,
            'rumpun' => 'Engineering',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add one more user with three roles
        $user4 = DB::table('users')->insertGetId([
            'nidn' => '303041',
            'nama' => 'user4',
            'email' => 'user4@example.com',
            'nip' => 'test-nip-4000',
            'no_telepon' => '081234567893',
            'id_jabatan' => $jabatan_4,
            'rumpun' => 'Engineering',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create users with two roles
        $usersWithTwoRoles = [
            [
                'nidn' => '402051',
                'nama' => 'user5',
                'email' => 'user5@example.com',
                'nip' => 'test-nip-5000',
                'no_telepon' => '081234567894',
                'id_jabatan' => $jabatan_4,
                'rumpun' => 'Engineering',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '502061',
                'nama' => 'user6',
                'email' => 'user6@example.com',
                'nip' => 'test-nip-6000',
                'no_telepon' => '081234567895',
                'id_jabatan' => $jabatan_1,
                'rumpun' => 'Engineering',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '602071',
                'nama' => 'user7',
                'email' => 'user7@example.com',
                'nip' => 'test-nip-7000',
                'no_telepon' => '081234567896',
                'id_jabatan' => $jabatan_2,
                'rumpun' => 'Engineering',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '702081',
                'nama' => 'user8',
                'email' => 'user8@example.com',
                'nip' => 'test-nip-8000',
                'no_telepon' => '081234567897',
                'id_jabatan' => $jabatan_3,
                'rumpun' => 'Engineering',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '802091',
                'nama' => 'user9',
                'email' => 'user9@example.com',
                'nip' => 'test-nip-9000',
                'no_telepon' => '081234567898',
                'id_jabatan' => $jabatan_4,
                'rumpun' => 'Engineering',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($usersWithTwoRoles as $user) {
            $userId = DB::table('users')->insertGetId($user);
            DB::table('role_user')->insert([
                ['user_id' => $user['nidn'], 'role_id' => 2], // Dosen role
                ['user_id' => $user['nidn'], 'role_id' => 3], // Reviewer role
            ]);
        }

        // Assign roles to users with three roles
        $threeRoleUsers = [
            '01110111',
            '102021',
            '202031',
            '303041'
        ];

        foreach ($threeRoleUsers as $nidn) {
            DB::table('role_user')->insert([
                ['user_id' => $nidn, 'role_id' => 1], // Admin role
                ['user_id' => $nidn, 'role_id' => 2], // Dosen role
                ['user_id' => $nidn, 'role_id' => 3], // Reviewer role
            ]);
        }
    }
}