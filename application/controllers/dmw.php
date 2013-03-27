<?php

class DMW_Controller extends Base_Controller {

    public $restful = true;


	public function get_index()	{

        return View::make('dmw.index')
            ->with('title','Dalton Musicworks - Home')
            ->with('navbar_itemName', ''); // Home page does not have a navbar item
	}

    public function get_amps()
    {
        return View::make('dmw.amps')
            ->with('title','Dalton Musicworks - Amps')
            ->with('navbar_itemName', 'top_navbar_amps');
    }

    public function get_effects()
    {
        return View::make('dmw.effects')
            ->with('title','Dalton Musicworks - Effects')
            ->with('navbar_itemName', 'top_navbar_effects');
    }

    public function get_videos() {

        return View::make('dmw.videos')
            ->with('title','Dalton Musicworks - Videos')
            ->with('navbar_itemName', 'top_navbar_videos');
    }

    public function get_faq()
    {
        return View::make('dmw.faq')
            ->with('title','Dalton Musicworks - FAQ')
            ->with('navbar_itemName', 'top_navbar_faq');
    }

    public function get_how_to_buy()
    {
        return View::make('dmw.howtobuy')
            ->with('title','Dalton Musicworks - How to Buy')
            ->with('navbar_itemName', 'top_navbar_howtobuy');
    }

    public function get_about_philosophy()
    {
        return View::make('dmw.about_philosophy')
            ->with('title','Dalton Musicworks - About our Philosophy')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_about_people()
    {
        return View::make('dmw.about_people')
            ->with('title','Dalton Musicworks - About our People')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_contact() {

        return View::make('dmw.contact')
            ->with('title','Dalton Musicworks - Contact')
            ->with('navbar_itemName', 'top_navbar_contact');
    }

    public function post_contact() {
        return 'Contact posted';
    }
}