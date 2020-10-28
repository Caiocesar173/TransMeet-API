<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id');
            $table->string('nomeFantasia');
            $table->string('razaoSocial');
            $table->string('Cnpj');
        });

        Schema::create('endereços', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ClienteId');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero');
            $table->string('cep');
            
            $table->foreign('ClienteId')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('endereços');
    }
}
