<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("rua");
            $table->string("bairro");
            $table->string("complemento")->nullable();
            $table->string("cep",20);
            $table->string("cidade");
            $table->integer("numero");
            $table->integer("principal");
            $table->unsignedBigInteger("id_cliente");
            $table->foreign("id_cliente")->references("id")->on("clientes");
            $table->timestamps();
            $table->softDeletes();

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
}
