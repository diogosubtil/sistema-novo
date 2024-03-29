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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefone')->nullable();
            $table->integer('funcao');
            $table->string('unidade_id');
            $table->enum('treinamento', ['s','n']);
            $table->enum('ativo', ['s','n'])->default('s');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert([
                'name' => 'Administrador',
                'email' => 'admin@admin.com.br',
                'email_verified_at' => null,
                'password' => '$2y$10$xaR.LHVTRnc9FkyM5c4VJeys/LnsF.brS/VdGQceCKX7S.m.J1Yci',
                'telefone' => '99999999999',
                'funcao' => 1,
                'unidade_id' => 1,
                'treinamento' => 'n',
                'ativo' => 's',
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
