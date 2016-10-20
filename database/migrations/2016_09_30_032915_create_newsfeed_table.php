<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatenewsfeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('newsfeed', function(Blueprint $table)
            {
            		$table->increments('id');
                    $table->string('batch_id');
                    $table->string('group_id');
                    $table->string('username');
                    $table->date('date');
                    $table->time('time');
                    $table->string('topic');
                    $table->string('description');
                    $table->binary('file');
                    $table->binary('link');
                    $table->string('file_name');
                    $table->integer('views');
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
		Schema::drop('newsfeed');

	}

}
