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
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id')->nullable();
            $table->float('total', 9, 2);
            $table->unsignedBigInteger('id_cliente') ->nullable();
            $table->tinyInteger('status')->comment('1:pendiente. 2:Aprovada.')->default(1);
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
