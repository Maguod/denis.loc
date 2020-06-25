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
            $table->float('margin_price', 10, 2)->nullable()->after('note');
            $table->longText('description')->default('')->nullable()->after('is_active');
            $table->mediumText('meta_search')->default('')->after('description')->nullable();
            $table->mediumText('image_link')->after('meta-search')->default('')->nullable();
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
           $table->dropColumn('meta_search');
           $table->dropColumn('image_link');
           $table->dropColumn('margin_price');
        });
    }
}
