<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploader', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seller');
            $table->string('type');
            $table->string('code');
            $table->string('slug');
            $table->float('price')->nullable();
            $table->string('note')->default('');
            $table->string('is_active')->default('yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploader');
    }
}
