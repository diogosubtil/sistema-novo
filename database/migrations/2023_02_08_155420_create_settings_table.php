<?php

use App\Models\Setting;
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
            $table->string('name','128');
            $table->string('color_primary','15');
            $table->string('color_secondary','15');
            $table->string('color_menu','15');
            $table->string('color_menu_letter','15');
            $table->string('color_menu_letter_active','15');
            $table->string('color_menu_title','15');
            $table->string('color_menu_icon','15');
            $table->string('color_login','15');
            $table->string('logo');
            $table->string('favicon');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('settings')->insert([
                'name' => 'Sem Nome',
                'color_primary' => '#01a9ac',
                'color_secondary' => '#01dbdf',
                'color_menu' => '#404e67',
                'color_menu_letter' => '#FFFFFF',
                'color_menu_letter_active' => '#01a9ac',
                'color_menu_title' => '#FFFFFF',
                'color_menu_icon' => '#FFFFFF',
                'color_login' => '#01a9ac',
                'logo' => '/files/assets/images/logo.png',
                'favicon' => '/files/assets/images/favicon.ico',
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
        Schema::dropIfExists('settings');
    }
};
