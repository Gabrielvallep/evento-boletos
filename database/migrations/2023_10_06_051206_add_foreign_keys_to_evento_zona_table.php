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
        Schema::table('evento_zona', function (Blueprint $table) {
            $table->foreign(['id_evento'], 'evento_formato_id_evento_fk')->references(['id'])->on('evento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_zona_formato'], 'evento_formato_id_zona_formato_fk')->references(['id'])->on('zona_formato')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento_zona', function (Blueprint $table) {
            $table->dropForeign('evento_formato_id_evento_fk');
            $table->dropForeign('evento_formato_id_zona_formato_fk');
        });
    }
};
