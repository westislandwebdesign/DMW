<?php

class Create_Parts_Table {    

	public function up()
    {
		Schema::create('parts', function($table) {
			$table->increments('id');
			$table->string('prod_id')->unique();
			$table->string('model');
			$table->string('model_friendly');
			$table->string('category', 20);
			$table->decimal('price', 5, 2);
			$table->text('short_desc');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('parts');

    }

}