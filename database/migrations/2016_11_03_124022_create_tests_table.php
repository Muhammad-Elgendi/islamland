<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('link')->nullable();
            $table->text('sc_link')->nullable();
            $table->text('link_title')->nullable();
            $table->text('title')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content1')->nullable();
            $table->longText('content2')->nullable();
            $table->longText('content3')->nullable();
            $table->longText('content4')->nullable();
            $table->longText('content5')->nullable();
            $table->longText('content6')->nullable();
            $table->text('f_img')->nullable();
            $table-> boolean('working')->nullable();
            $table-> boolean('report')->nullable();
            $table->integer('visits')->nullable();
            $table->string('source')->nullable();
            $table->string('section')->nullable();
            $table->string('author')->nullable();
            $table->text('ico')->nullable();
            $table->text('source_ico')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
