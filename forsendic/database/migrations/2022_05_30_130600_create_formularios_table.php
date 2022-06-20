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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('aluno_nome');
            $table->string('aluno_matricula');
            $table->string('aluno_email');
            $table->string('demanda');
            $table->string('status')->nullable();
            $table->foreignId('editado_por')
                ->nullable()
                ->references('id')
                ->on('secretarios');
                // ->constrained();

            $table->string('file');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios');
    }
};
