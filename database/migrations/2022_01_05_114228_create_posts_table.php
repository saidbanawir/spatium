<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('judul_post');
            $table->string('slug')->unique();
            $table->string('nama_perusahaan');
            $table->string('kota_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('foto_perusahaan')->nullable();
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->text('exerpt');
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
