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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id('idEndereco');
            $table->string('cidadeEndereco');
            $table->char('ufEndereco', 2);
            $table->string('bairroEndereco');
            $table->string('logradouroEndereco');
            $table->string('numeroEndereco', 20);
            $table->char('cepEndereco', 8);
            $table->string('complementoEndereco')->nullable(true);
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
        Schema::dropIfExists('enderecos');
    }
};
