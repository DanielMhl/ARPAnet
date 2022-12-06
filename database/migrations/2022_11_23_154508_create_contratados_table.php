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
        Schema::create('contratados', function (Blueprint $table) {
            $table->id('idContratado');
            $table->date('dtContratacaoContratado');
            $table->date('dtDesligamentoContratado');
            $table->text('descricaoServico');
            $table->unsignedBigInteger('idPessoa');
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')
            ->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratados');
    }
};
