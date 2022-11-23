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
            $table->char('cpfPessoa', 11);
            $table->char('cnpjPessoa', 14);
            $table->string('telefonePessoa', 20);
            $table->timestamps();
        });
    }


    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nasc');
            $table->enum('sexo', ['f','m']);
            $table->string('email')->unique;
            $table->string('telefone', 15);
            $table->char('cpf', 11);
            $table->string('foto');
            $table->decimal('salario', 10,2);
            
            $table->unsignedBigInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamentos')
            ->onUpdate('restrict')->onDelete('restrict');

            $table->unsignedBigInteger('id_cargo');
            $table->foreign('id_cargo')->references('id')->on('cargos')
            ->onUpdate('restrict')->onDelete('restrict');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')
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
        Schema::dropIfExists('pessoas');
    }
};
