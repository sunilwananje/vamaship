<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressBook extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address_books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',100);
			$table->string('person_name',100);
			$table->bigInteger('person_phone');
			$table->string('address_line1');
			$table->string('address_line2');
			$table->string('address_line3');
			$table->integer('pincode');
			$table->string('city');
			$table->string('state');
			$table->string('country');
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
		Schema::drop('address_book');
	}

}
