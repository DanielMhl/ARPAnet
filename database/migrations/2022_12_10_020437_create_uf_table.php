<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('uf', function (Blueprint $table) {
            $table->id();
            $table->char('ufSigla', 2);
            $table->string('ufDescricao', 50);
            $table->timestamps();
        });

        DB::table('uf')->insert(
            array(
                ['ufSigla' => 'AC', 'ufDescricao' => 'Acre'],
                ['ufSigla' => 'AL', 'ufDescricao' => 'Alagoas'],
                ['ufSigla' => 'AP', 'ufDescricao' => 'Amapá'],
                ['ufSigla' => 'AM', 'ufDescricao' => 'Amazonas'],
                ['ufSigla' => 'BA', 'ufDescricao' => 'Bahia'],
                ['ufSigla' => 'CE', 'ufDescricao' => 'Ceará'],
                ['ufSigla' => 'DF', 'ufDescricao' => 'Distrito Federal'],
                ['ufSigla' => 'ES', 'ufDescricao' => 'Espírito Santo'],
                ['ufSigla' => 'GO', 'ufDescricao' => 'Goiás'],
                ['ufSigla' => 'MA', 'ufDescricao' => 'Maranhão'],
                ['ufSigla' => 'MT', 'ufDescricao' => 'Mato Grosso'],
                ['ufSigla' => 'MS', 'ufDescricao' => 'Mato Grosso do Sul'],
                ['ufSigla' => 'MG', 'ufDescricao' => 'Minas Gerais'],
                ['ufSigla' => 'PA', 'ufDescricao' => 'Pará'],
                ['ufSigla' => 'PB', 'ufDescricao' => 'Paraíba'],
                ['ufSigla' => 'PR', 'ufDescricao' => 'Paraná'],
                ['ufSigla' => 'PE', 'ufDescricao' => 'Pernambuco'],
                ['ufSigla' => 'PI', 'ufDescricao' => 'Piauí'],
                ['ufSigla' => 'RJ', 'ufDescricao' => 'Rio de Janeiro'],
                ['ufSigla' => 'RN', 'ufDescricao' => 'Rio Grande do Norte'],
                ['ufSigla' => 'RS', 'ufDescricao' => 'Rio Grande do Sul'],
                ['ufSigla' => 'RO', 'ufDescricao' => 'Rondônia'],
                ['ufSigla' => 'RR', 'ufDescricao' => 'Roraima'],
                ['ufSigla' => 'SC', 'ufDescricao' => 'Santa Catarina'],
                ['ufSigla' => 'SP', 'ufDescricao' => 'São Paulo'],
                ['ufSigla' => 'SE', 'ufDescricao' => 'Sergipe'],
                ['ufSigla' => 'TO', 'ufDescricao' => 'Tocantins'],
                ['ufSigla' => 'EX', 'ufDescricao' => 'Estrangeiro'],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uf');
    }
};
