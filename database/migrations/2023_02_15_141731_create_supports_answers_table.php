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
        Schema::create('supports_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('support_id')->constrained()->onDelete('cascade');
            $table->integer('user');
            $table->foreignId('unidade_id')->constrained()->onDelete('cascade');
            $table->text('answer');
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
        Schema::dropIfExists('supports_answers');
    }
};
