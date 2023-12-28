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
        Schema::create('logbook_notes', function (Blueprint $table) {
            $table->id();
            $table->string('item_kerja');
            $table->text('deskripsi');
            $table->unsignedBigInteger('logbook_dibuat_id');
            $table->foreign('logbook_dibuat_id')->references('id')->on('tanggal_pembuatan_logbooks')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('logbook_notes');
    }
};
