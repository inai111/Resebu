<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->index();
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama');
            $table->longText('body')->nullable();
            $table->string('video')->nullable();
            $table->string('gambar');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reseps');
    }
}
