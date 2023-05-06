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
            $table->string('estado_civil')->nullable();
            $table->date('dataNascimento')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->text('endereco')->nullable();
            $table->string('cep')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('numero')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->foreignId('unidade_id')->constrained();
            $table->enum('transferido', ['n','s'])->default('n');
            $table->string('diabetes')->nullable();
            $table->string('cardiaco')->nullable();
            $table->string('hormonal')->nullable();
            $table->string('foliculite')->nullable();
            $table->text('foliculite_onde')->nullable();
            $table->string('doenca_de_pele')->nullable();
            $table->text('doenca_de_pele_qual')->nullable();
            $table->string('fotossensiveis')->nullable();
            $table->text('fotossensiveis_qual')->nullable();
            $table->string('queloides')->nullable();
            $table->text('queloides_qual')->nullable();
            $table->string('alergico')->nullable();
            $table->text('alergico_qual')->nullable();
            $table->string('herpes')->nullable();
            $table->text('herpes_frequencias')->nullable();
            $table->string('epilepsia')->nullable();
            $table->text('epilepsia_frequencias')->nullable();
            $table->string('neoplasias_metastases')->nullable();
            $table->text('neopla_metast_qual')->nullable();
            $table->string('medicamentos')->nullable();
            $table->text('medicamentos_qual')->nullable();
            $table->string('doenca_autoimune')->nullable();
            $table->text('doenca_autoimune_qual')->nullable();
            $table->string('gestante')->nullable();
            $table->text('gestante_meses')->nullable();
            $table->string('lactante')->nullable();
            $table->text('lactante_tempo')->nullable();
            $table->string('tratamento')->nullable();
            $table->text('tratamento_qual')->nullable();
            $table->string('pelos_brancos_loiros_ruivos')->nullable();
            $table->string('exposicao_sol')->nullable();
            $table->text('exposicao_sol_frequencia')->nullable();
            $table->string('filtro_solar')->nullable();
            $table->string('roacutan')->nullable();
            $table->text('roacutan_qual')->nullable();
            $table->string('medic_fotossensiveis')->nullable();
            $table->text('medic_fotossensiveis_qual')->nullable();
            $table->string('anabolizante')->nullable();
            $table->text('anabolizante_qual')->nullable();
            $table->string('acidos')->nullable();
            $table->text('acidos_tempo')->nullable();
            $table->string('laser')->nullable();
            $table->text('laser_qual')->nullable();
            $table->string('tatuagem_micropig')->nullable();
            $table->text('tatuagem_micropig_onde')->nullable();
            $table->string('reacoes')->nullable();
            $table->text('reacoes_qual')->nullable();
            $table->enum('ativo', ['s','n'])->default('s');
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
