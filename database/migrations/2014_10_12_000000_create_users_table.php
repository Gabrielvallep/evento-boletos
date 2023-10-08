<?php

use App\Models\Usuario;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dui')->unique();
            $table->string('telefono');
            $table->boolean('estado')->default(true);
            $table->integer('id_rol')->index('usuarios_rol_id_tipo_usuario_fk');
            $table->rememberToken();
            $table->timestamps();
        });
        Usuario::create([
        'nombre' => 'Jenniffer',
            'email' => 'test@example.com',
            'dui' => '12345678-1',
            'telefono' => '12345678',
            'password'=>Hash::make('root'),
            'id_rol' => '1'

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
