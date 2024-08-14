<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('nidn', 10)->primary();
            
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');

            $table->string('nama'); 
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nip'); // Changed from integer to string
            $table->string('no_telepon'); // Changed from integer to string
            $table->string('rumpun');
            $table->string('password'); 
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id', 10);
            $table->foreign('user_id')->references('nidn')->on('users')->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};