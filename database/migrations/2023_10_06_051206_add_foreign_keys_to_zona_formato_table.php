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
        Schema::table('zona_formato', function (Blueprint $table) {
            $table->foreign(['id_formato'], 'zona_formato_id_formato_fk')->references(['id'])->on('formato')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_zona'], 'zona_formato_id_zona_fk')->references(['id'])->on('zonas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zona_formato', function (Blueprint $table) {
            $table->dropForeign('zona_formato_id_formato_fk');
            $table->dropForeign('zona_formato_id_zona_fk');
        });
    }
};
