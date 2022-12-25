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
        Schema::create('list_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('tanggal_pengajuan');
            $table->string('alamat');
            $table->string('image_encrypt')->nullable();
            $table->string('kota');
            $table->string('provinsi');
            $table->string('fax');
            $table->string('email');
            $table->string('kodepos');
            $table->string('warna');
            $table->longText('deskripsi');
            $table->string('merk');
            $table->string('kelas');
            $table->string('jenis');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
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
        Schema::dropIfExists('list_data');
    }
};
