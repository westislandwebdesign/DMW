<?php

class Create_Guitars_Table {    

	public function up()
    {
		Schema::create('guitars', function($table) {
			$table->increments('id');
			$table->string('model');
			$table->string('prod_id')->unique();
			$table->decimal('price', 5, 2);
			$table->text('short_desc');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('guitars');

    }

}