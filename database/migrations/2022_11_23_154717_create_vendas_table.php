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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id('idVenda');
            $table->decimal('valorVenda', 12,2);
            $table->date('dataVenda');
            $table->string('ntFiscalVenda');
            $table->string('formaPagamentoVenda');

            $table->unsignedBigInteger('idComprador');
            $table->foreign('idComprador')->references('idComprador')->on('compradores')
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
        Schema::dropIfExists('vendas');
    }
};
