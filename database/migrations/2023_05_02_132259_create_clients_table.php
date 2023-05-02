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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->enum('sexo', ['f','m']);
            $table->string('estado_civil');
            $table->date('dataNascimento');
            $table->string('cpf');
            $table->string('rg');
            $table->text('endereco');
            $table->string('cep');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('numero');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('senha');
            $table->foreignId('unidade_id')->constrained();
            $table->enum('transferido', ['n','s']);
            $table->string('diabetes');
            $table->string('cardiaco');
            $table->string('hormonal');
            $table->string('foliculite');
            $table->string('foliculite_onde');
            $table->string('doenca_de_pele');
            $table->string('doenca_de_pele_qual');
            $table->string('fotossensiveis');
            $table->string('fotossensiveis_qual');
            $table->string('queloides');
            $table->string('queloides_qual');
            $table->string('alergico');
            $table->string('alergico_qual');
            $table->string('herpes');
            $table->string('herpes_frequencias');
            $table->string('epilepsia');
            $table->string('epilepsia_frequencias');
            $table->string('neoplasias_metastases');
            $table->string('neopla_metast_qual');
            $table->string('medicamentos');
            $table->string('medicamentos_qual');
            $table->string('doenca_autoimune');
            $table->string('doenca_autoimune_qual');
            $table->string('gestante');
            $table->string('gestante_meses');
            $table->string('lactante');
            $table->string('lactante_tempo');
            $table->string('tratamento');
            $table->string('tratamento_qual');
            $table->string('pelos_brancos_loiros_ruivos');
            $table->string('exposicao_sol');
            $table->string('exposicao_sol_frequencia');
            $table->string('filtro_solar');
            $table->string('roacutan');
            $table->string('roacutan_qual');
            $table->string('medic_fotossensiveis');
            $table->string('medic_fotossensiveis_qual');
            $table->string('anabolizante');
            $table->string('anabolizante_qual');
            $table->string('acidos');
            $table->string('acidos_tempo');
            $table->string('laser');
            $table->string('laser_qual');
            $table->string('tatuagem_micropig');
            $table->string('tatuagem_micropig_onde');
            $table->string('reacoes');
            $table->string('reacoes_qual');
            $table->enum('ativo', ['s','n']);
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
        Schema::dropIfExists('clients');
    }
};
