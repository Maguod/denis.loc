<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('parent_id')->default(0);
            $table->integer('main_id')->default(0);
            $table->string('in_price')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

//            $table->unique(['parent_id', 'slug']);
//            $table->unique(['parent_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_categories');
    }
}
