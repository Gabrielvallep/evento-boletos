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
    public function up():void
    {
        Schema::create('asientos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('numero')->nullable();
            $table->integer('fila');
            $table->integer('id_zona')->nullable()->index('asientos_zonas_id_zona_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('asientos');
    }
};
