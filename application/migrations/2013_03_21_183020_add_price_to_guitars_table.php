<?php

class Add_Price_To_Guitars_Table {    

	public function up()
    {
		Schema::table('guitars', function($table) {
			$table->decimal('price', 8, 2);
	});

    }    

	public function down()
    {
		Schema::table('guitars', function($table) {
			$table->drop_column('price');
	});

    }

}