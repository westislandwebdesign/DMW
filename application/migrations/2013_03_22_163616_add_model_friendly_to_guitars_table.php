<?php

class Add_Model_Friendly_To_Guitars_Table {    

	public function up()
    {
		Schema::table('guitars', function($table) 
        {
            $table->string('model_friendly');
        });

    }    

	public function down()
    {
		Schema::table('guitars', function($table) {
			$table->drop_column('model_friendly');
        });
    }

}