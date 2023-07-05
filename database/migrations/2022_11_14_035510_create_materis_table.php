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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aslab_id');
            $table->foreign('aslab_id')->references('id')->on('aslabs')->nullable($value = false);
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->nullable($value = false);
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('matkuls')->nullable($value = false);
            $table->string('judul_materi')->nullable($value = false);
            $table->string('keterangan')->nullable();
            $table->string('materi')->nullable();
            $table->string('tgl_deadline')->nullable();
            $table->string('tgl_upload')->nullable($value = false);
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
        Schema::dropIfExists('materis');
    }
};
