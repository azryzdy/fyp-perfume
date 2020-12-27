<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StuffToSubcategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategorys', function (Blueprint $table) {
            $table->integer('category_id');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->tinyInteger('priority')->default('0');
            $table->tinyInteger('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcategorys', function (Blueprint $table) {
            //
        });
    }
}
