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
            ->with('title','Parts')
            ->with('navbar_itemName', 'top_navbar_parts');
    }

    private function show_parts_group($title, $navbar_item_name, $part_cat, $parts_paginator) {
        return View::make('parts.parts')
            ->with('title', $title)
            ->with('navbar_itemName', $navbar_item_name)
            ->with('part_category', $part_cat)
            ->with('parts_paginator', $parts_paginator);
    }

    // "/parts/:prod_id"
    // display a specific item
    public function get_show($model)
    {
        $model = strtolower($model);
        $part = Part::where_model($model)->first();

        if ($part) {
            return View::make('parts.part')
                ->with('title', $model)
                ->with('navbar_itemName', 'top_navbar_parts')
                ->with('part', $part);
        }
        else {
            return $this->get_index();
        }
    }

    public function get_bodies()
    {
        $bodies_paginator = Part::parts(Part::CAT_NAME_BODY, 'ASC', 3);

        return $this->show_parts_group('Bodies', 'top_navbar_parts', 'Bodies', $bodies_paginator);
    }

    public function get_fixed_bridges()
    {
        return "show fixed bridges";

//        $fixed_bridges = Part::where_category(Part::CAT_NAME_FIXED_BRIDGE);
//
//        return View::make('parts.fixed_bridges')
//            ->with('title','Dalton Musicworks - Fixed Bridges')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('fixed_bridges', $fixed_bridges);
    }

    public function get_trem_bridges() {

        return "show trem bridges";

//        $trem_bridges = Part::where_category(Part::CAT_NAME_TREM_BRIDGE);
//
//        return View::make('parts.trem_bridges')
//            ->with('title','Dalton Musicworks - Tremolo Bridges')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('trem_bridges', $trem_bridges);
    }

    public function get_hardware() {

        return "show hardware";

//        $hardware = Part::where_category(Part::CAT_NAME_HARDWARE);
//
//        return View::make('parts.hardware')
//            ->with('title','Dalton Musicworks - Hardware')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('hardware', $hardware);
    }

    public function get_machine_heads() {

        return "show machine heads";

//        $machine_heads = Part::where_category(Part::CAT_NAME_MACHINE_HEAD);
//
//        return View::make('parts.machine_heads')
//            ->with('title','Dalton Musicworks - Machine Heads')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('machine_heads', $machine_heads);
    }

    public function get_necks() {

        return "show necks";

//        $necks = Part::where_category(Part::CAT_NAME_NECK);
//
//        return View::make('parts.necks')
//            ->with('title','Dalton Musicworks - Necks')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('necks', $necks);
    }

    public function get_pickguards() {

        return "show pickguards";

//        $pickguards = Part::where_category(Part::CAT_NAME_PICKGUARD);
//
//        return View::make('parts.pickguards')
//            ->with('title','Dalton Musicworks - Pickguards')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('pickguards', $pickguards);
    }

    public function get_pickups() {

        return "show pickups";

//        $pickups = Part::where_category(Part::CAT_NAME_PICKUP);
//
//        return View::make('parts.pickups')
//            ->with('title','Dalton Musicworks - Pickups')
//            ->with('navbar_itemName', 'top_navbar_parts')
//            ->with('pickups', $pickups);
    }
}