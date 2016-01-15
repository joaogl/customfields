<?php

use Illuminate\Database\Migrations\Migration;
use \jlourenco\base\Database\Blueprint;

class CreateCustomfieldsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('CustomField', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 25);
            $table->string('friendly_name', 150);
            $table->string('value', 250)->nullable();
            $table->string('type', 25);
            $table->tinyinteger('visibility');
        });

        Schema::create('CustomValue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customfield')->unsigned();
            $table->string('entity', 100);
            $table->integer('registry');
            $table->string('value', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customfield')->references('id')->on('CustomField');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('CustomValue');
        Schema::drop('CustomField');

    }

}
