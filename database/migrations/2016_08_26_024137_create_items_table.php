<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('link');
            $table->text('sc_link');
            $table->text('link_title');
            $table->text('title');
            $table->longText('content');
            $table->longText('content1')->nullable();
            $table->longText('content2')->nullable();
            $table->longText('content3')->nullable();
            $table->longText('content4')->nullable();
            $table->longText('content5')->nullable();
            $table->longText('content6')->nullable();
            $table->text('f_img');
            $table-> boolean('working');
            $table-> boolean('report');
            $table->integer('visits');
            $table->string('source');
            $table->string('section');
            $table->string('author');
            $table->text('ico');
            $table->text('source_ico');            
            //seo
            $table->text('description');
            $table->text('keywords');
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
        Schema::drop('items');
    }
}
