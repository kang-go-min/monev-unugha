<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responden', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('usia', 4);
            $table->string('jk', 5);
            $table->string('alamat');
            $table->string('nama_kk');
            $table->string('id_wilayah', 13);
            $table->string('hp_telp');
            $table->integer('id_pekerjaan');
            $table->unsignedBigInteger('petugas_id')->index();
            $table->string('tmpt_kerja');
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
        Schema::dropIfExists('responden');
    }
}
