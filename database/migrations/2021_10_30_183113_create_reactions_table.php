<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->string('display_name_es');
            $table->string('image_svg');
            $table->string('image_gif');
            $table->timestamps();
        });

        DB::table('reactions')->insert([
            'id' => 1,
            'name' => 'love',
            'display_name' => 'I love it',
            'display_name_es' => 'Me encanta',
            'image_svg' => 'https://lh3.googleusercontent.com/proxy/ZJeJZ-ZkSijdR_oBwhJXJcW84-vSm7AVELiYX_i4cXpt2VG_LB6IWHXLVIo5ZZC_ypCHcJiSpKXBYytiippO3-MhMGhtLLA-ZaNjqjiUp-O5UmrobeGQ2aNLP6L24b16EPliH_lm1_-ckbLylqr3cODFV7yctPZyEb6N1Vhm7QCSHdpOOFvBV6vRUKCPKnrtkAv6',
            'image_gif' => 'https://lh3.googleusercontent.com/proxy/ZJeJZ-ZkSijdR_oBwhJXJcW84-vSm7AVELiYX_i4cXpt2VG_LB6IWHXLVIo5ZZC_ypCHcJiSpKXBYytiippO3-MhMGhtLLA-ZaNjqjiUp-O5UmrobeGQ2aNLP6L24b16EPliH_lm1_-ckbLylqr3cODFV7yctPZyEb6N1Vhm7QCSHdpOOFvBV6vRUKCPKnrtkAv6',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactions');
    }
}
