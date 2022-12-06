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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idPessoa');
            $table->string('nomePessoa');
            $table->char('tipoPessoa', 1);
            $table->char('cpfPessoa', 11)->nullable();
            $table->char('cnpjPessoa', 14)->nullable();
            $table->string('telefonePessoa', 20)->nullable();
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
        Schema::dropIfExists('pessoas');
    }
};
