<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id')->nullable()->index();
            $table->string('siswa_status')->nullable();
            $table->string('nama', 255);
            $table->string('nisn', 20)->unique();
            $table->string('jurusan', 20);
            $table->string('kelas', 3);
            $table->integer('angkatan');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_siswas');
    }
};
