<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengumuman')->insert([
            [
                'id_user' => '01110111', // Ensure this ID exists in the `users` table
                'tanggal' => now(),
                'judul' => 'Announcement One',
                'deskripsi' => 'This is a short description for the first announcement.',
                'file' => 'path/to/file1.pdf',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => '102021', // Ensure this ID exists in the `users` table
                'tanggal' => now(),
                'judul' => 'Announcement Two',
                'deskripsi' => 'This is a short description for the second announcement.',
                'file' => 'path/to/file2.pdf',
                'status' => 'draf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => '202031', // Ensure this ID exists in the `users` table
                'tanggal' => now(),
                'judul' => 'Announcement Three',
                'deskripsi' => 'This is a short description for the third announcement.',
                'file' => 'path/to/file3.pdf',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => '303041', // Ensure this ID exists in the `users` table
                'tanggal' => now(),
                'judul' => 'Announcement Four',
                'deskripsi' => 'This is a short description for the fourth announcement.',
                'file' => 'path/to/file4.pdf',
                'status' => 'draf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
