<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorys', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('url'); // tak buat add to this table...just main save je
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->tinyInteger('priority')->default('0');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('subcategorys');
    }
}
