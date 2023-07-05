<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      public function up()
    {
        Schema::table('data_user', function (Blueprint $table) {
            $table->unsignedBigInteger('data_id');
            
            $table->foreign('data_id')
                ->references('id')->on('data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('data_user', function (Blueprint $table) {
            $table->dropForeign(['data_id']);
            $table->dropColumn('data_id');
        });
    }
};
