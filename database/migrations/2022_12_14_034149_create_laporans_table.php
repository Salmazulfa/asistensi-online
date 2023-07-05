<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->nullable($value = false);
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('matkuls')->nullable($value = false);
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->nullable($value = false);
            $table->unsignedBigInteger('aslab_id');
            $table->foreign('aslab_id')->references('id')->on('aslabs')->nullable($value = false);
            $table->unsignedBigInteger('materi_id');
            $table->foreign('materi_id')->references('id')->on('materis')->nullable($value = false);
            $table->string('tgl_upload');
            $table->string('laporan')->nullable();
            $table->string('nilai');
            $table->string('komentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};
