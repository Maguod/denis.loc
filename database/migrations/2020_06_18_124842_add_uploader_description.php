<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUploaderDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploader', function (Blueprint $table) {
            $table->longText('description')->default('')->nullable()->after('is_active');
            $table->mediumText('meta-search')->default('')->after('description')->nullable();
            $table->mediumText('image-link')->after('meta-search')->default('')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploader', function (Blueprint $table) {
           $table->dropColumn('description');
           $table->dropColumn('meta-search');
           $table->dropColumn('image-link');
        });
    }
}
