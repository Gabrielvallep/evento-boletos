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
        Schema::create('formato', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 200);
            $table->integer('descripcion');
            $table->integer('id_escenario')->index('formato_escenario_id_escenario_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formato');
    }
};
