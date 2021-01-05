<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('nama');
            $table->string('jeniskelamin');
            $table->date('tgllahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('pukul');
            $table->string('bertempat');
            $table->string('penyebab');
            $table->string('namapelapor');
            $table->string('NIK');
            $table->string('tgllahirpelapor');
            $table->string('alamatpelapor');
            $table->string('hubungan');
            $table->integer('harga');
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
        Schema::dropIfExists('surats');
    }
}
