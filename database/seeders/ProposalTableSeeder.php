<?php

namespace Database\Seeders;

use App\Models\capaian;
use App\Models\proposal;
use App\Models\skema_penelitian;
use App\Models\tim_litabmas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProposalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id_skema_penelitian = skema_penelitian::insertGetId([
            'nama_skema' => 'Penelitian Tesis Magister',
            'sumber_dana' => 'Eksternal',
            'durasi' => 24,
            'satuan_durasi' => 'Bulan',
            'total_biaya' => 36000000,
            'bobot_rumusan_masalah' => 5,
            'bobot_luaran' => 5,
            'bobot_metode' => 5,
            'bobot_tinjauan_pustaka' => 5,
            'bobot_kelayakan' => 5,
        ]);

        // Loop untuk menambahkan 20 proposal
        for ($i = 1; $i <= 20; $i++) {
            $status = $i % 2 == 0 ? 'draf' : 'submitted'; // Bergantian antara draft dan submitted

            $id_proposal = proposal::insertGetId([
                'user_nidn' => '01110111',
                'id_skema' => $id_skema_penelitian,
                'judul' => 'Eksplorasi Pengalaman Guru dalam Mengimplementasikan Kurikulum 2013 di Sekolah Dasar ' . $i,
                'nama_mitra' => 'Sekolah Dasan Negri XYZ',
                'alamat_mitra' => 'Jalan Cemara, No. 48, Kabupaten Kebumen, Kota Kebumen',
                'kata_kunci' => 'Eksplorasi, Pengalaman Guru, Kurikulum 2013, Sekolah Dasar',
                'latar_belakang' => 'Mencari tahu bagaimana pengalaman guru mengimplementasikan kurikulum 2013 di Sekolah Dasar',
                'ringkasan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, itaque adipisci. Eveniet fuga sed quibusdam velit culpa optio illum asperiores animi ullam. Nesciunt accusantium optio reprehenderit, iste autem tempore! Repellat.',
                'urgensi' => 'rendah',
                'rumusan_masalah' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, minus sit natus sint expedita repellendus numquam, cum in ut distinctio suscipit, possimus voluptas incidunt praesentium voluptates aperiam laudantium laboriosam voluptatem? Nulla sapiente delectus animi velit? Distinctio consequuntur corrupti, veniam, alias numquam culpa mollitia eligendi in saepe impedit odit vel dolores officiis incidunt quia dolorem explicabo dolor cupiditate nulla laboriosam sapiente.',
                'pendekatan_pemecahan_masalah' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, itaque adipisci. Eveniet fuga sed quibusdam velit culpa optio illum asperiores animi ullam. Nesciunt accusantium optio reprehenderit, iste autem tempore! Repellat.',
                'kebaruan' => 'nothing',
                'metode_penelitian' => 'i don\'t know',
                'jadwal_penelitian' => 'senin, selasa, rabu, kamis, jum\'at, sabtu, minggu',
                'daftar_pustaka' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
                'status' => $status, // Menggunakan status yang telah disesuaikan
                'status_approvel' => null,
                'nilai' => null,
                'tanggal_submit' => $status === 'submitted' ? now() : null, // Set tanggal jika status submitted
                'approvel_date' => null,
                'laporan_progress' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
                'laporan_akhir' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
            ]);

            // Seed data untuk capaian
            for ($j = 2025; $j <= 2027; $j++) {
                capaian::insert([
                    "id_proposal" => $id_proposal,
                    "tahun" => (string)$j,
                    "jenis_capaian" => 'HKI',
                    "indikator" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?'
                ]);
            }

            // Seed data untuk tim_litabmas
            for ($k = 1; $k <= 5; $k++) {
                tim_litabmas::insert([
                    "id_proposal" => $id_proposal,
                    "nama" => 'Person ' . $k,
                    "tugas" => 'tugas-' . $k,
                    "status" => $k === 1 ? 'Ketua' : 'Anggota' // Ketua untuk anggota pertama, sisanya anggota
                ]);
            }
        }
    }
}
