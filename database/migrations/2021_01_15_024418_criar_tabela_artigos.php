<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaArtigos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function(Blueprint $tabela) {
            $tabela->increments('id');
            $tabela->integer('id_usuario');
            $tabela->string('nome_veiculo');
            $tabela->string('link');
            $tabela->smallInteger('ano');
            $tabela->string('combustivel');
            $tabela->smallInteger('portas');
            $tabela->integer('quilometragem');
            $tabela->string('cambio');
            $tabela->string('cor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artigos');
    }
}
