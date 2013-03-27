<?php

class Add_Long_Desc_To_Parts_Table {    

	public function up()
    {
		Schema::table('parts', function($table) {
			$table->text('long_desc');
	});

    }    

	public function down()
    {
		Schema::table('parts', function($table) {
			$table->drop_column('long_desc');
	});

    }

}