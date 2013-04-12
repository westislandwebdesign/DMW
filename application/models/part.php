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
    const CAT_NAME_TREM_BRIDGE  = 'TREM_BRIDGE';
    const CAT_NAME_HARDWARE     = 'HARDWARE';
    const CAT_NAME_MACHINE_HEAD = 'MACHINE_HEAD';
    const CAT_NAME_NECK         = 'NECK';
    const CAT_NAME_PICKGUARD    = 'PICKGUARD';
    const CAT_NAME_PICKUP       = 'PICKUP';

    // these need to be the same as the routes declared in routes.php
    const ROUTE_BODIES          = 'bodies';
    const ROUTE_FIXED_BRIDGES   = 'fixed-bridges';
    const ROUTE_TREM_BRIDGES    = 'trem-bridges';
    const ROUTE_HARDWARE        = 'hardware';
    const ROUTE_MACHINE_HEADS   = 'machine-heads';
    const ROUTE_NECKS           = 'necks';
    const ROUTE_PICKGUARDS      = 'pickguards';
    const ROUTE_PICKUPS         = 'pickups';

    // returns a Paginator object
    public static function parts($cat_name, $order_by, $results_per_page) {
        return static::where('category', '=', $cat_name)->order_by('id', $order_by)->paginate($results_per_page);
    }

    public function friendly_category($db_category, $plural=1) {

        $friendly_cat = '';

        switch($db_category) {

            case Part::CAT_NAME_BODY:
                $friendly_cat = $plural  ? 'Bodies' : 'Body';
                break;

            case Part::CAT_NAME_FIXED_BRIDGE:
                $friendly_cat = $plural  ? 'Fixed Bridges' : 'Fixed Bridge';
                break;

            case Part::CAT_NAME_TREM_BRIDGE:
                $friendly_cat = $plural  ? 'Tremolo Bridges' : 'Tremolo Bridge';
                break;

            case Part::CAT_NAME_HARDWARE:
                $friendly_cat = 'Hardware';
                break;

            case Part::CAT_NAME_MACHINE_HEAD:
                $friendly_cat = 'Machine Heads';
                break;

            case Part::CAT_NAME_NECK:
                $friendly_cat = $plural  ? 'Necks' : 'Neck';
                break;

            case Part::CAT_NAME_PICKGUARD:
                $friendly_cat = $plural  ? 'Pickguards' : 'Pickguard';
                break;

            case Part::CAT_NAME_PICKUP:
                $friendly_cat = $plural  ? 'Neck' : 'Neck';
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

            default:
                $route = '';
        }

        return $route;
    }
}