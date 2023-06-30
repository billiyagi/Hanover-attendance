<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_user', function (Blueprint $table) {
            // Kolom pada tabel data_user
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('data_id');
            
            // Definisi foreign key dengan opsi CASCADE
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('data_id')
                ->references('id')->on('data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            // Tambahkan kolom lainnya jika diperlukan
            
            // Timestamps
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_user');
    }
};
