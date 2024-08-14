<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('user_nidn', 10);
            $table->foreign('user_nidn')->references('nidn')->on('users')->onDelete('cascade');
            
            $table->bigInteger('id_skema')->unsigned();
            $table->foreign('id_skema')->references('id')->on('skema_penelitians');
            $table->string('judul');
            $table->string('nama_mitra');
            $table->text('alamat_mitra');
            $table->text('kata_kunci');
            $table->text('latar_belakang');
            $table->text('ringkasan');
            $table->text('urgensi');
            $table->text('rumusan_masalah');
            $table->text('pendekatan_pemecahan_masalah');
            $table->text('kebaruan');
            $table->text('metode_penelitian');
            $table->text('jadwal_penelitian');
            $table->text('daftar_pustaka');
            $table->enum('status', ['draf', 'submitted']);
            $table->enum('status_approvel', ['diterima', 'ditolak'])->nullable();
            $table->integer('nilai')->nullable();
            $table->date('tanggal_submit')->nullable();
            $table->date('approvel_date')->nullable();
            $table->text('laporan_progress');
            $table->text('laporan_akhir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('proposals');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};