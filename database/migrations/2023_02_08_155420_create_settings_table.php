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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color_primary');
            $table->string('color_secondary');
            $table->string('logo');
            $table->string('favicon');
            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                'name' => 'Sem Nome',
                'color_primary' => '#01a9ac',
                'color_secondary' => '#01dbdf',
                'logo' => '/files/assets/images/logo.png',
                'favicon' => '/files/assets/images/favicon.ico',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
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
        Schema::dropIfExists('settings');
    }
};