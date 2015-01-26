<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPosterFieldsToMoviesTable extends Migration {

	/**
	 * Make changes to the table.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::table('movies', function(Blueprint $table) {		
			
			$table->string('poster_file_name')->nullable();
			$table->integer('poster_file_size')->nullable();
			$table->string('poster_content_type')->nullable();
			$table->timestamp('poster_updated_at')->nullable();

		});

	}

	/**
	 * Revert the changes to the table.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('movies', function(Blueprint $table) {

			$table->dropColumn('poster_file_name');
			$table->dropColumn('poster_file_size');
			$table->dropColumn('poster_content_type');
			$table->dropColumn('poster_updated_at');

		});
	}

}
