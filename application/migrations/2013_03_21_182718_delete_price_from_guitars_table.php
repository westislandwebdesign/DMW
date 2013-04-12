<?php

class Delete_Price_From_Guitars_Table {    

	public function up()
    {
		Schema::table('guitars', function($table) {
			$table->drop_column(price);
            });

            }

	public function down()
    {
		Schema::table('guitars', function($table) 
        {
            $table->decimal('price', 5, 2);
        });

    }

}