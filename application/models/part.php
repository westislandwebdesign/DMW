<?php

class Part extends Basemodel
{
    public static $rules = array(
        'model'  => 'required',
        'prod_id'  => 'required',
        'category' => 'required',
        'price'  => 'required',
        'short_desc'  => 'required'
    );

    // these need to be the same as the category string in the dmw_db parts table
    const CAT_NAME_BODY         = 'BODY';
    const CAT_NAME_FIXED_BRIDGE = 'FIXED_BRIDGE';
    const CAT_NAME_VIB_BRIDGE   = 'VIB_BRIDGE';
    const CAT_NAME_HARDWARE     = 'HARDWARE';
    const CAT_NAME_MACHINE_HEAD = 'MACHINE_HEAD';
    const CAT_NAME_NECK         = 'NECK';
    const CAT_NAME_PICKGUARD    = 'PICKGUARD';
    const CAT_NAME_PICKUP       = 'PICKUP';
    const CAT_NAME_ELECTRONICS  = 'ELECTRONICS';
    const CAT_NAME_ACCESSORIES  = 'ACCESSORY';

    // these need to be the same as the routes declared in routes.php
    const ROUTE_BODIES          = 'bodies';
    const ROUTE_FIXED_BRIDGES   = 'fixed-bridges';
    const ROUTE_VIB_BRIDGES     = 'vibrato-bridges';
    const ROUTE_HARDWARE        = 'hardware';
    const ROUTE_MACHINE_HEADS   = 'machine-heads';
    const ROUTE_NECKS           = 'necks';
    const ROUTE_PICKGUARDS      = 'pickguards';
    const ROUTE_PICKUPS         = 'pickups';
    const ROUTE_ACCESSORIES     = 'accessories';

    // returns a Paginator object
    public static function parts($cat_name, $order_by, $results_per_page) {
        return static::where('category', '=', $cat_name)->order_by('id', $order_by)->paginate($results_per_page);
    }

    public function category_name_for_breadcrumbs($db_category) {

        $friendly_cat = '';

        switch($db_category) {

            case Part::CAT_NAME_BODY:
                $friendly_cat = 'Bodies';
                break;

            case Part::CAT_NAME_FIXED_BRIDGE:
                $friendly_cat = 'Fixed Bridges';
                break;

            case Part::CAT_NAME_VIB_BRIDGE:
                $friendly_cat = 'Vibrato Bridges';
                break;

            case Part::CAT_NAME_HARDWARE:
                $friendly_cat = 'Hardware';
                break;

            case Part::CAT_NAME_MACHINE_HEAD:
                $friendly_cat = 'Machine Heads';
                break;

            case Part::CAT_NAME_NECK:
                $friendly_cat = 'Necks';
                break;

            case Part::CAT_NAME_PICKGUARD:
                $friendly_cat = 'Pickguards';
                break;

            case Part::CAT_NAME_PICKUP:
                $friendly_cat = 'Pickups';
                break;

            case Part::CAT_NAME_ELECTRONICS:
                $friendly_cat = 'Electronics';
                break;

            case Part::CAT_NAME_ACCESSORIES:
                $friendly_cat = 'Accessories';
                break;

            default:
                $friendly_cat = $db_category;
        }

        return $friendly_cat;
    }

    public function part_route($db_category) {

        $route = '';

        switch($db_category) {
            case Part::CAT_NAME_BODY:
                $route = Part::ROUTE_BODIES;
                break;

            case Part::CAT_NAME_FIXED_BRIDGE:
                $route = Part::ROUTE_FIXED_BRIDGES;
                break;

            case Part::CAT_NAME_TREM_BRIDGE:
                $route = Part::ROUTE_TREM_BRIDGES;
                break;

            case Part::CAT_NAME_HARDWARE:
                $route = Part::ROUTE_HARDWARE;
                break;

            case Part::CAT_NAME_MACHINE_HEAD:
                $route = Part::ROUTE_MACHINE_HEADS;
                break;

            case Part::CAT_NAME_NECK:
                $route = Part::ROUTE_NECKS;
                break;

            case Part::CAT_NAME_PICKGUARD:
                $route = Part::ROUTE_PICKGUARDS;
                break;

            case Part::CAT_NAME_PICKUP:
                $route = Part::ROUTE_PICKUPS;
                break;

            case Part::CAT_NAME_ELECTRONICS:
                $route = Part::ROUTE_ELECTRONICS;
                break;

            default:
                $route = '';
        }

        return $route;
    }
}