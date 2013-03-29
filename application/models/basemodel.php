<?php

class Basemodel extends Eloquent 
{
    // let Laravel update the timestamps in the table for us
    public static $timestamps = true;

    public static function validate($data) {

        // BAD OOP!!: base class is accessing derived class' static $rules
        return Validator::make($data, static::$rules);
    }

    public static function get_table_for_category($item_category) {

        $table = '';

        switch($item_category) {

            case Part::CAT_NAME_BODY:
            case Part::CAT_NAME_BODY:
            case Part::CAT_NAME_FIXED_BRIDGE:
            case Part::CAT_NAME_TREM_BRIDGE:
            case Part::CAT_NAME_HARDWARE:
            case Part::CAT_NAME_MACHINE_HEAD:
            case Part::CAT_NAME_NECK:
            case Part::CAT_NAME_PICKGUARD:
            case Part::CAT_NAME_PICKUP:
                $table = 'parts';
                break;
        }

       return $table;
    }

}