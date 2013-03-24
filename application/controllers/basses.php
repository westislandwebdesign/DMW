<?php

class Basses_Controller extends Base_Controller 
{
    public $restful = true;

//    public function __contruct() {
//        // the 'auth' filter is defined in routes.php
//        // the array lists all actions which need to be secured, i.e. logged in user
//        $this->filter('before', 'auth')->only(array('new', 'edit', 'update', 'destroy'));
//    }

    // "/guitars"
    // display a list of items
    public function get_index()
    {
        //$basses = Bass::all();

        return View::make('basses.index')
            ->with('title','Dalton Musicworks - Basses')
            ->with('navbar_itemName', 'top_navbar_basses')
            /*->with('basses', $basses)*/;
    }
}