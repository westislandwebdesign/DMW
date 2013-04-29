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

    private function show_parts_group($title, $navbar_item_name, $part_cat, $db_cat_name) {

        try {
            $parts_paginator = Part::parts($db_cat_name, 'ASC', 6);
            return View::make('parts.parts')
                ->with('title', $title)
                ->with('navbar_itemName', $navbar_item_name)
                ->with('part_category', $part_cat)
                ->with('parts_paginator', $parts_paginator);
        }
        catch (Exception $e) {
            return Redirect::to_route('error')->with('error', $e->getMessage());
        }

    }

    // "/parts/:prod_id"
    // display a specific item
    public function get_show($model) {
        $model = strtolower($model);
        $part = Part::where_model($model)->first();

        // Get ID of a Part whose autoincremented ID is less than the current user, but because some entries might have been deleted we need to get the max available ID of all entries whose ID is less than current user's
        $id = Part::where('id', '<', $part->id)->max('id');
        $previous_part = null;
        if ($id)
            $previous_part = Part::where_id($id)->first();

        // Same for the next part's id as previous user's but in the other direction
        $id = Part::where('id', '>', $part->id)->min('id');
        $next_part = null;
        if ($id)
            $next_part = Part::where_id($id)->first();

        if ($part) {
            return View::make('parts.part')
                ->with('title', $model)
                ->with('navbar_itemName', 'top_navbar_parts')
                ->with('part', $part)
                ->with('previous_part', $previous_part)
                ->with('next_part', $next_part);
        }
        else {
            return $this->get_index();
        }
    }

    public function get_bodies() {
        return $this->show_parts_group('Bodies', 'top_navbar_parts', 'Bodies', Part::CAT_NAME_BODY);
    }

    public function get_fixed_bridges() {
        return $this->show_parts_group('Fixed Bridges', 'top_navbar_parts', 'Fixed Bridges', Part::CAT_NAME_FIXED_BRIDGE);
    }

    public function get_vib_bridges() {
        return $this->show_parts_group('Vibrato Bridges', 'top_navbar_parts', 'Vibrato Bridges', Part::CAT_NAME_VIB_BRIDGE);
    }

    public function get_hardware() {
        return $this->show_parts_group('Hardware', 'top_navbar_parts', 'Hardware', Part::CAT_NAME_HARDWARE);
    }

    public function get_machine_heads() {
        return $this->show_parts_group('Machine Heads', 'top_navbar_parts', 'Machine Heads', Part::CAT_NAME_MACHINE_HEAD);
    }

    public function get_necks() {
        return $this->show_parts_group('Necks', 'top_navbar_parts', 'Necks', Part::CAT_NAME_NECK);
    }

    public function get_pickguards() {
        return $this->show_parts_group('Pickguards', 'top_navbar_parts', 'Pickguards', Part::CAT_NAME_PICKGUARD);
    }

    public function get_pickups() {
        return $this->show_parts_group('Pickups', 'top_navbar_parts', 'Pickups', Part::CAT_NAME_PICKUP);
    }

    public function get_electronics() {
        return $this->show_parts_group('Electronics', 'top_navbar_parts', 'Electronics', Part::CAT_NAME_ELECTRONICS);
    }

    public function get_accessories() {
        return $this->show_parts_group('Accessories', 'top_navbar_parts', 'Accessories', Part::CAT_NAME_ACCESSORIES);
    }

    public function post_add_to_cart() {

        $prod_id = Input::get('prod_id', '');
        $part_page_link = Input::get('part_page_link', '');

        $qty = Input::get('quantity', 1);
        $image = Input::get('image', '');

        $part = Part::where_prod_id($prod_id)->first();

        // Populate a proper item array.
        $item = array(
            'id'      => $part->prod_id,
            'qty'     => $qty,
            'price'   => $part->price,
            'name'    => $part->model_friendly,
            'options' => array(
                'db_category'       => $part->category,
                'image'             => $image,
                'part_page_link'    => $part_page_link
            )
        );

        $error_message = '';
        try {
            Cartify::cart()->insert($item);
        }
        catch (Cartify\CartInvalidDataException $e)
        {
            $error_message = 'Invalid data passed.';
        }
        catch (Cartify\CartRequiredIndexException $e)
        {
            $error_message = $e->getMessage();
        }
        catch (Cartify\CartInvalidItemQuantityException $e)
        {
            $error_message = 'Invalid item quantity.';
        }
        catch (Cartify\CartInvalidItemRowIdException $e)
        {
            // Redirect back to the home page.
            $error_message = 'Invalid item row id.';
        }
        catch (Cartify\CartInvalidItemNameException $e)
        {
            $error_message = 'Invalid item name.';
        }
        catch (Cartify\CartInvalidItemPriceException $e)
        {
            $error_message = 'Invalid item price.';
        }
        catch (Cartify\CartException $e)
        {
            $error_message = 'An unexpected error occurred!';
        }

        if (!is_null($error_message) && !empty($error_message)) {
            return Redirect::to_route('error')->with('error', $error_message);
        }

        return Redirect::to('cart');
    }
}