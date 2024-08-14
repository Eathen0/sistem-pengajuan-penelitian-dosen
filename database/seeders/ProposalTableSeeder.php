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

        $id_proposal = proposal::insertGetId([
            'user_nidn' => '01110111',
            'id_skema' => $id_skema_penelitian,
            'judul' => 'Eksplorasi Pengalaman Guru dalam Mengimplementasikan Kurikulum 2013 di Sekolah Dasar',
            'nama_mitra' => 'Sekolah Dasan Negri XYZ',
            'alamat_mitra' => 'Jalan Cemara, No. 48, Kabupaten Kebumen, Kota Kebumen',
            'kata_kunci' => 'Eksplorasi, Pengalaman Guru, Kurukulum 2013, Sekolah Dasar',
            'latar_belakang' => 'Mencari tahu bagaimana pengalaman guru mengimplementasikan kurikulum 2013 di Sekolah Dasar',
            'ringkasan' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, itaque adipisci. Eveniet fuga sed quibusdam velit culpa optio illum asperiores animi ullam. Nesciunt accusantium optio reprehenderit, iste autem tempore! Repellat.',
            'urgensi' => 'rendah',
            'rumusan_masalah' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, minus sit natus sint expedita repellendus numquam, cum in ut distinctio suscipit, possimus voluptas incidunt praesentium voluptates aperiam laudantium laboriosam voluptatem? Nulla sapiente delectus animi velit? Distinctio consequuntur corrupti, veniam, alias numquam culpa mollitia eligendi in saepe impedit odit vel dolores officiis incidunt quia dolorem explicabo dolor cupiditate nulla laboriosam sapiente.',
            'pendekatan_pemecahan_masalah' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, itaque adipisci. Eveniet fuga sed quibusdam velit culpa optio illum asperiores animi ullam. Nesciunt accusantium optio reprehenderit, iste autem tempore! Repellat.',
            'kebaruan' => 'nothing',
            'metode_penelitian' => 'i don\'t know',
            'jadwal_penelitian' => 'senin, selasa, rabu, kamis, jum\'at, sabtu, minggu',
            'daftar_pustaka' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
            'status' => 'submitted',
            'status_approvel' => null,
            'nilai' => null,
            'tanggal_submit' => now(),
            'approvel_date' => null,
            'laporan_progress' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
            'laporan_akhir' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?',
        ]);
        
        //* capaian data example
        capaian::insert([
            "id_proposal" => $id_proposal, 
            "tahun" => '2025', 
            "jenis_capaian" => 'HKI', 
            "indikator" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?'
        ]);

        capaian::insert([
            "id_proposal" => $id_proposal, 
            "tahun" => '2026', 
            "jenis_capaian" => 'HKI', 
            "indikator" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?'
        ]);

        capaian::insert([
            "id_proposal" => $id_proposal, 
            "tahun" => '2027', 
            "jenis_capaian" => 'HKI', 
            "indikator" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet doloremque dignissimos, ipsa aut mollitia officiis veritatis alias atque! Atque veritatis nam ipsa ipsam dolor magnam excepturi qui numquam corrupti aliquam?'
        ]);


        //* tim_litabmas data example
        tim_litabmas::insert([
            "id_proposal" => $id_proposal, 
            "nama" => 'John', 
            "tugas" => 'tugas-1', 
            "status" => 'Ketua'
        ]);

        tim_litabmas::insert([
            "id_proposal" => $id_proposal, 
            "nama" => 'jane', 
            "tugas" => 'tugas-2', 
            "status" => 'Anggota'
        ]);

        tim_litabmas::insert([
            "id_proposal" => $id_proposal, 
            "nama" => 'mary', 
            "tugas" => 'tugas-3', 
            "status" => 'Anggota'
        ]);

        tim_litabmas::insert([
            "id_proposal" => $id_proposal, 
            "nama" => 'peter', 
            "tugas" => 'tugas-4', 
            "status" => 'Anggota'
        ]);

        tim_litabmas::insert([
            "id_proposal" => $id_proposal, 
            "nama" => 'david', 
            "tugas" => 'tugas-5', 
            "status" => 'Anggota'
        ]);
    }
}
