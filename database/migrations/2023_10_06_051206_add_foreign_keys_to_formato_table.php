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
        Schema::table('formato', function (Blueprint $table) {
            $table->foreign(['id_auditorio'], 'formato_auditorio_id_auditorio_fk')->references(['id'])->on('auditorio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formato', function (Blueprint $table) {
            $table->dropForeign('formato_auditorio_id_auditorio_fk');
        });
    }
};
