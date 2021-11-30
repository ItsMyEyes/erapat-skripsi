<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListRapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_rapats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('start');
            $table->string('selesai');
            $table->string('diselesaikan');
            $table->text('desc');
            $table->string('ruangan');
            $table->string('link_rapat')->nullable();
            $table->string('type_rapat');
            $table->string('jangka_waktu')->nullable();
            $table->string('frekuensi_rapat')->nullable();
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
        Schema::dropIfExists('list_rapats');
    }
}
