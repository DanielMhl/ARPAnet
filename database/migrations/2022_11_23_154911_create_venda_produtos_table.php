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
        Schema::create('venda_produtos', function (Blueprint $table) {
            $table->id('idVendaProduto');
            $table->decimal('pesoVenda', 10,2);

            $table->unsignedBigInteger('idVenda');
            $table->foreign('idVenda')->references('idVenda')->on('vendas')
            ->onUpdate('restrict')->onDelete('restrict');

            $table->unsignedBigInteger('idProduto');
            $table->foreign('idProduto')->references('idProduto')->on('produtos')
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
        Schema::dropIfExists('venda_produtos');
    }
};
