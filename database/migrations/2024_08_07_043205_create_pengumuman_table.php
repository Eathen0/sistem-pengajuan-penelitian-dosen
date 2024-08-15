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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('id_user', 10);
            $table->foreign('id_user')->references('nidn')->on('users')->onDelete('cascade');
            $table->date('tanggal');
            $table->string('judul', 100);
            $table->text('deskripsi');
            $table->text('file')->nullable();
            $table->enum('status', ['draf', 'publish']);
            $table->timestamps();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('pengumuman');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};