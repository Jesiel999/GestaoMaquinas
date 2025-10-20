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
        Schema::create('maquina', function (Blueprint $table) {
            $table->increments('maqu_codigo');
            $table->string('maqu_nome');
            $table->string('iplocal');
            $table->string('ippublico');
            $table->string('maqu_so');
            $table->string('maqu_versaoso');
            $table->string('maqu_arquitetura');
            $table->string('maqu_processador');
            $table->string('maqu_cores');
            $table->string('maqu_threads');
            $table->string('maqu_ram');
            $table->string('maqu_usocpu');
            $table->string('maqu_usoram');
            $table->dateTime('coleta');
            $table->string('maqu_marca');
            $table->string('maqu_modelo');
            $table->unsignedBigInteger('maqu_responsavel');
            $table->foreign('maqu_responsavel')
                ->references('cola_codigo')
                ->on('colaborador')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquina');
    }
};
