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
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengaduan_id');
            $table->unsignedBigInteger('user_id');
            $table->text('isi_tanggapan')->nullable();
            $table->date('tgl_tanggapan')->nullable();
            $table->timestamps();

            $table->foreign('pengaduan_id')->references('id')->on('pengaduan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapan');
    }
};
