<?php

class Parts_Controller extends Base_Controller 
{
    public $restful = true;

//    public function __contruct() {
//        // the 'auth' filter is defined in routes.php
//        // the array lists all actions which need to be secured, i.e. logged in user
//        $this->filter('before', 'auth')->only(array('new', 'edit', 'update', 'destroy'));
//    }

    // "/parts"
    // display the parts categories
    public function get_index()
    {
        return View::make('parts.index')
            ->with('title','Dalton Musicworks - Parts')
            ->with('navbar_itemName', 'top_navbar_parts');
    }

    public function get_bodies()
    {
        $catname = Part::CAT_NAME_BODY;
        $bodies = Part::where_category(Part::CAT_NAME_BODY)->get();

        return View::make('parts.bodies')
            ->with('title','Dalton Musicworks - Bodies')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('bodies', $bodies);
    }

    public function get_fixed_bridges()
    {
        $fixed_bridges = Part::where_category(Part::CAT_NAME_FIXED_BRIDGE);

        return View::make('parts.fixed_bridges')
            ->with('title','Dalton Musicworks - Fixed Bridges')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('fixed_bridges', $fixed_bridges);
    }

    public function get_trem_bridges() {

        $trem_bridges = Part::where_category(Part::CAT_NAME_TREM_BRIDGE);

        return View::make('parts.trem_bridges')
            ->with('title','Dalton Musicworks - Tremolo Bridges')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('trem_bridges', $trem_bridges);
    }

    public function get_hardware() {

        $hardware = Part::where_category(Part::CAT_NAME_HARDWARE);

        return View::make('parts.hardware')
            ->with('title','Dalton Musicworks - Hardware')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('hardware', $hardware);
    }

    public function get_machine_heads() {

        $machine_heads = Part::where_category(Part::CAT_NAME_MACHINE_HEAD);

        return View::make('parts.machine_heads')
            ->with('title','Dalton Musicworks - Machine Heads')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('machine_heads', $machine_heads);
    }

    public function get_necks() {

        $necks = Part::where_category(Part::CAT_NAME_NECK);

        return View::make('parts.necks')
            ->with('title','Dalton Musicworks - Necks')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('necks', $necks);
    }

    public function get_pickguards() {

        $pickguards = Part::where_category(Part::CAT_NAME_PICKGUARD);

        return View::make('parts.pickguards')
            ->with('title','Dalton Musicworks - Pickguards')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('pickguards', $pickguards);
    }

    public function get_pickups() {

        $pickups = Part::where_category(Part::CAT_NAME_PICKUP);

        return View::make('parts.pickups')
            ->with('title','Dalton Musicworks - Pickups')
            ->with('navbar_itemName', 'top_navbar_parts')
            ->with('pickups', $pickups);
    }
}