<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlsAndDirectoryFieldsToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('directory')->after('id')->nullable();
            $table->string('url_xl')->after('id')->nullable();
            $table->string('url_lg')->after('id')->nullable();
            $table->string('url_md')->after('id')->nullable();
            $table->string('url_sm')->after('id')->nullable();
            $table->string('url_xs')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('directory');
            $table->dropColumn('url_xl');
            $table->dropColumn('url_lg');
            $table->dropColumn('url_md');
            $table->dropColumn('url_sm');
            $table->dropColumn('url_xs');
        });
    }
}
