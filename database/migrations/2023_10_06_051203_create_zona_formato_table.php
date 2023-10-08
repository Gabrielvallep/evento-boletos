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
        Schema::create('zona_formato', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_zona')->index('zona_formato_id_zona_fk');
            $table->integer('id_formato')->index('zona_formato_id_formato_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zona_formato');
    }
};
