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
            $table->string('default_value', 250)->nullable();
            $table->string('type', 25);
            $table->binary('register');
            $table->binary('edit');
            $table->binary('mandatory');
            $table->binary('edit');
            $table->text("html");
            $table->string('entity', 100);

            $table->timestamps();
            $table->softDeletes();
            $table->creation();
        });

        Schema::create('CustomValue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customfield')->unsigned();
            $table->string('value', 250)->nullable();

            $table->morphs("entity");
            $table->timestamps();
            $table->softDeletes();
            $table->creation();

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
