<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDataToMoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('movies', function(Blueprint $table)
		{
			$table->datetime('released_on')->nullable();
			$table->string('genre')->nullable();
			$table->string('imdbRating')->nullable();
			$table->text('plot')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('movies', function(Blueprint $table)
		{
			$table->dropColumn('released_on');
			$table->dropColumn('genre');
			$table->dropColumn('imdbRating');
			$table->dropColumn('plot');
		});
	}

}
