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
        Schema::table('reservas', function (Blueprint $table) {
            $table->foreign(['id_boleto'], 'reservas_boletos_id_boleto_fk')->references(['id'])->on('boleto')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['id_usuario'], 'reservas_usuarios_id_usuario_fk')->references(['id'])->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->dropForeign('reservas_boletos_id_boleto_fk');
            $table->dropForeign('reservas_usuarios_id_usuario_fk');
        });
    }
};
