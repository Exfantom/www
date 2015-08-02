<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pages_id')->unsigned()->nullable();
            $table->tinyInteger('sort')->default(0);
            $table->text('title');
            $table->longText('content');
            $table->timestamps();
            $table->index(array('pages_id'));
            $table->foreign('pages_id')->references('id')->on('pages')->on_delete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nodes');
    }
}
