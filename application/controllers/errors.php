<?php

class Errors_Controller extends Base_Controller 
{
    public function action_error() {

            return View::make('error.dmw_error')
                ->with('title','Error')
                ->with('navbar_itemName', '');
    }
}