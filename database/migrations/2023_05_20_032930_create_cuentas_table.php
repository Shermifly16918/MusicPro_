<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('usuario');
            $table->string('email')->unique();
            $table->string('contrasena');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono') ->nullable();
            $table->rememberToken();
            $table->date('created_at');
            $table->date('updated_at');
            // $table->unsignedBigInteger('state_id');
        });

        Schema::table('cliente', function (Blueprint $table) {
            $table->foreign('cuenta_id')
                     ->references('id')->on('cuentas')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuenta');
    }
};
