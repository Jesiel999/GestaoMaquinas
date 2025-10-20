<?php

use _PHPStan_781aefaf6\Nette\DI\Definitions\Reference;
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
        Schema::create('colaborador', function (Blueprint $table) {
            $table->increments('cola_codigo'); // INT UNSIGNED
            $table->string('cola_nome');
            $table->string('cola_cpf', 14);
            $table->string('cola_telefone', 20);
            $table->string('cola_email')->unique();

            $table->unsignedInteger('cola_departamento'); // INT UNSIGNED também
            $table->foreign('cola_departamento')
                ->references('depa_codigo')
                ->on('departamento')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
