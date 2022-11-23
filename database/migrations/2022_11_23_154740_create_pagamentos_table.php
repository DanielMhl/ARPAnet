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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id('idPagamento');
            $table->decimal('valorPagamento', 12,2);
            $table->date('dataPagamento');

            $table->unsignedBigInteger('idAssociado');
            $table->foreign('idAssociado')->references('idAssociado')->on('associados')
            ->onUpdate('restrict')->onDelete('restrict');

            $table->unsignedBigInteger('idContratado');
            $table->foreign('idContratado')->references('idContratado')->on('contratados')
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
        Schema::dropIfExists('pagamentos');
    }
};
