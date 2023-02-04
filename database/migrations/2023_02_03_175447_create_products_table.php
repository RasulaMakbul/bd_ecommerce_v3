<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->string('shortDefination')->nullable();
            $table->longText('description');
            $table->longText('test');
            $table->longText('result');
            $table->longText('howToUse');
            $table->longText('pack');
            $table->longText('ingredient');
            $table->string('weight');
            $table->string('pao');
            $table->string('origin');
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('status')->default('0')->comment('1=visible,0=hidden');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->text('images')->nullable();

            $table->integer('costing');
            $table->integer('originalPrice');
            $table->integer('sellingPrice');



            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
