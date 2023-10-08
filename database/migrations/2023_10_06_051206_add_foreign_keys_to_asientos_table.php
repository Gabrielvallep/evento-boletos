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
        Schema::table('asientos', function (Blueprint $table) {
            $table->foreign(['id_zona'], 'asientos_zonas_id_zona_fk')->references(['id'])->on('zonas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asientos', function (Blueprint $table) {
            $table->dropForeign('asientos_zonas_id_zona_fk');
        });
    }
};
